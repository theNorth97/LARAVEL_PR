<?php

namespace App\Services;

use App\Models\ActiveRequest;
use Illuminate\Support\Facades\Auth;


class ApplicationService
{
    public function showCreateForm()
    {
        return view('application.form_create');
    }

    public function store(array $validated): void
    {
        ActiveRequest::create([
            'user_id' => $validated['user_id'],
            'service_name' => $validated['service_name'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
        ]);
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

    public function finish1(ActiveRequest $application)
    {
        $application->update([
            'status' => 'finished',
        ]);

        return redirect()->route('dashboard')->with('success', 'заявка завершена');
    }
}
