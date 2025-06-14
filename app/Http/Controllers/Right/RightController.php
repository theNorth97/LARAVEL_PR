<?php

namespace App\Http\Controllers\Right;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Right;
use App\Models\User;
use App\Services\RightService;

class RightController extends Controller
{
    private RightService $service;

    public function __construct(RightService $service)
    {
        $this->service = $service;
    }

    public function showRightForm(Request $request)
    {
        $this->authorize('update', Right::class); // сделать политик или ворота 
        return $this->service->showRightForm($request);
    }

    public function AddRight(Request $request) // пененести толстого в сервис
    {
        $user = User::findOrFail($request->input('user_id'));
        $rightName = $request->input('right_name');
        $right = Right::where('name', $rightName)->firstOrfail();

        if (!$user->rights->contains('id', $right->id)) {
            $user->rights()->attach([$right->id]);
            return redirect()->route('rightForm')->with('success', 'Право успешно добавлено!');
        } else {
            return redirect()->route('rightForm')->with('warning', 'У пользователя есть такое право!');
        }
    }

    public function showFormSearchRights() // пененести в сервис
    {
        return view('rights.right');
    }

    public function search(Request $request) // пененести толстого в сервис
    {
        if (User::where('id', $request->input('id'))->exists()) {
            $user = User::findOrFail($request->input('id'));
            $rights = $user->rights;
            return view('rights.right', compact('user', 'rights'));
        }
        return redirect()->route('rightForm')->with('warning', 'Юзера с таким айди не существует!');
    }

    public function rightFinish($user, $right) // пененести толстого в сервис
    {
        $user = User::findOrFail($user);
        $right = Right::findOrFail($right);
        $user->rights()->detach($right->id);

        return redirect()->route('rightForm')->with('success', 'Право успешно удалено');
    }
}
