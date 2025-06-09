<?php

namespace App\Http\Controllers\application;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use Illuminate\Http\Request;
use App\Models\ActiveRequest;
use App\Models\Right;
use App\Services\ApplicationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        return view('rights.searchRightsUser');
    }

    public function right(Request $request, ApplicationService $service)
    {
        $user = User::findOrFail($request->input('user_id'));
        $rightName = $request->input('right_name');
        $right = Right::where('name', $rightName)->firstOrfail();

        $user->rights()->syncWithoutDetaching([$right->id]);

        return $service->index();
        // 1. Получить пользователя
        // 2. Получить имя выбранного права из формы
        // 3. Найти право по имени (name)
        // 4. Добавить это право пользователю (attach)
        // 5. Вернуть назад или куда надо, с сообщением
    }


    public function showFormSearchRights()
    {
        return view('rights.right');
    }

    public function search(Request $request)
    {

        $user = User::findOrFail($request->input('id'));
        $rights = $user->rights;

        return view('rights.right', compact('user', 'rights'));
    }

    public function deleteRight(Request $request)
    {
        true;
    }
}
