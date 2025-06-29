<?php

namespace App\Services;

use App\Models\Right;
use App\Models\User;

class RightService
{
    public function showRightForm()
    {
        return view('rights.searchRightsUser');
    }

    public function AddRight($userId, $rightName)
    {
        $user = User::findOrFail($userId);
        $right = Right::where('name', $rightName)->firstOrFail();

        if (!$user->rights->contains('id', $right->id)) {
            $user->rights()->attach([$right->id]);
            return redirect()->route('rightForm')->with('success', 'Право успешно добавлено!');
        } else {
            return redirect()->route('rightForm')->with('warning', 'У пользователя есть такое право!');
        }
    }

    public function search($userId)
    {
        $user = User::find($userId);
        $rights = $user ? $user->rights : null;
        return [$user, $rights];
    }

    public function rightFinish($user, $right)
    {
        $user = User::findOrFail($user);
        $right = Right::findOrFail($right);
        $user->rights()->detach($right->id);
        return true;
    }


    echo 'test';
}
