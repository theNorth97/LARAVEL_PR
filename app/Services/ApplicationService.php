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
        if (isset($request->rights['can_create_application']) && $request->rights['can_create_application']) {
            return view('application.form_create');
        };

        return redirect()->route('dashboard')->with('warning', 'Доступ к созданию заявки ограничен');
        // будет прилетать реквест с правами ( если есть право "смотреть" то показываем вью , если нету то 403)
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
        //сделать столбец finished  и в него переносить заверщеные заявки , а не в updated/
    }
}
