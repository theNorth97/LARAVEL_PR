<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActiveRequest;


class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm()
    {
        return view('application.form_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required',
            'phone' => 'required|regex:/^[\d\+\-\(\)\s]+$/|min:6|max:20',
            'description' => 'required',
        ]);

        ActiveRequest::create([
            'user_id' => Auth::id(),
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

    public function finish($id)
    {
        $application = ActiveRequest::findOrFail($id);
        $this->authorize('update', $application);

        $application->update([
            'status' => 'finished',
        ]);

        return redirect()->route('dashboard')->with('success', 'заявка завершена!');
    }
}
