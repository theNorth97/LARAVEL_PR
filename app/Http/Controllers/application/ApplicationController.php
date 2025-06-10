<?php

namespace App\Http\Controllers\application;

use App\Models\User;
use App\Models\ActiveRequest;
use App\Models\Right;
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

    ///////////////////////////////////////////////////////////

    public function showRightForm()
    {
        return view('rights.searchRightsUser');
    }

    public function right(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $rightName = $request->input('right_name');
        $right = Right::where('name', $rightName)->firstOrfail();

        $user->rights()->syncWithoutDetaching([$right->id]);

        return redirect()->route('rightForm')->with('success', 'Право успешно добавлено!');

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

    public function rightFinish($user, $right)
    {
        $user = User::findOrFail($user);
        $right = Right::findOrFail($right);
        $user->rights()->detach($right->id);

        return redirect()->back()->with('success', 'Право успешно удалено!');
    }
}
