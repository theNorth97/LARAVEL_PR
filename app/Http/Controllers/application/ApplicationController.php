<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use Illuminate\Http\Request;
use App\Models\ActiveRequest;
use App\Services\ApplicationService;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm(ApplicationService $service)
    {
        $this->authorize('create', ActiveRequest::class);
        return $service->showCreateForm();
    }

    public function store(StoreApplicationRequest $request, ApplicationService $service)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $service->store($validated);
        return redirect()->route('dashboard')->with('success', 'заявка успешно создана');
    }

    public function index(ApplicationService $service)
    {
        $this->authorize('view', ActiveRequest::class);
        return $service->index();
    }

    public function finish($id, ApplicationService $service)
    {
        $application = ActiveRequest::findOrFail($id);
        $this->authorize('update', $application);

        return $service->finish($application);
    }

    public function showRightForm()
    {
        return view('rights.right');
    }

    public function rights()
    {
        return true;
    }
}
