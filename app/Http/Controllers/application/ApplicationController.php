<?php

namespace App\Http\Controllers\application;

use App\Models\ActiveRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private ApplicationService $service;

    public function __construct(ApplicationService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function showCreateForm(Request $request)
    {
        $this->authorize('create', ActiveRequest::class);
        return $this->service->showCreateForm($request);
    }

    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $this->service->store($validated);
        return redirect()->route('dashboard')->with('success', 'заявка успешно создана');
    }

    public function index()
    {
        $this->authorize('view', ActiveRequest::class);
        return $this->service->index();
    }

    public function finish($id)
    {
        $application = ActiveRequest::findOrFail($id);
        $this->authorize('update', $application);

        return $this->service->finish($application);
    }
}

echo 'test';
