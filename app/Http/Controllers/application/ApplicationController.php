<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActiveRequest;


class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm(CreateUserRequest $request)
    {
        if (isset($request->rights['can_create_aplication']) && $request->rights['can_create_aplication']) {
            return view('application.form_create');
        };

        return view('login');
        // будет прилетать реквест с правами ( если есть право смотреть то показываем вью , если нету  то 403)
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
        dd('1');

        $application->update([
            'status' => 'finished',
        ]);

        return redirect()->route('dashboard')->with('success', 'заявка завершена!');
    }
}
