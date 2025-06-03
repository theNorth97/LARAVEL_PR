<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
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

    public function showCreateForm(CreateUserRequest $request, ApplicationService $service)
    {
        $this->authorize('create', ActiveRequest::class);
        return $service->showCreateForm($request);
    }

    public function store(StoreApplicationRequest $request, ApplicationService $service)
    {
        return $service->store($request);
    }

    public function index(ApplicationService $service)
    {
        return $service->index();
    }

    public function finish($id, ApplicationService $service)
    {
        $application = ActiveRequest::findOrFail($id);
        $this->authorize('update', $application);

        return $service->finish($application);
    }
}
