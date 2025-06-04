<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Models\ActiveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\ActiveRequestPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;

class ApplicationService
{
    public function showCreateForm(CreateUserRequest $request)
    {
        return view('application.form_create');
    }

    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();

        ActiveRequest::create([
            'user_id' => $request->user()->id,
            'service_name' => $validated['service_name'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('dashboard')->with('success', 'заявка успешно создана');
    }

    public function index()
    {
        $applications = Auth::user()->activeRequests()->where('status', 'active')->get();
        $finishedApplications = Auth::user()->activeRequests()->where('status', 'finished')->get();

        return view('application.index', compact('applications', 'finishedApplications'));
    }

    public function finish(ActiveRequest $application)
    {
        $application->update([
            'status' => 'finished',
        ]);

        return redirect()->route('dashboard')->with('success', 'заявка завершена');
    }
}
