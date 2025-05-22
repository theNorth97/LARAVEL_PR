<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActiveRequest;
use App\Models\FinishedRequest;


class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm()
    {
        return view('application.form_create_application');
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
        $applications = ActiveRequest::all();
        return view('название_маршрута_добавлю_потом', compact('applications'));
    }

    public function finish($id)
    {
        $application = ActiveRequest::findOrFail($id);

        $FinishedApplication =  FinishedRequest::create([
            'user_id' => $application->user_id,
            'service_name' => $application->service_name,
            'phone' => $application->phone,
            'description' => $application->description,
            'finished_at' => now(),
            'created_at' => $application->created_at,
        ]);

        $application->delete();

        return redirect()->route('название_маршрута_добавлю_потом')->with('success', 'заявка завершена!');
    }

    public function finishedIndex()
    {
        $finishedApplications = FinishedRequest::all();
        return view('название_маршрута_добавлю_потом', compact('finishedApplications'));
    }
}
