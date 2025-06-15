<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getFormCreateUser()
    {
        return view('showFormCreateUser');
    }

    public function CreateUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Пользователь успешно создан!');
    }

    public function getAllUsers()
    {
        $users = User::all();
        return view('showAllUsers', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::destroy($id);
        return redirect()->back()->with('success', 'Пользователь удален');
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('allUsers')->with('success', 'обновлен!');
    }

    public function UpdateFormUser($id)
    {
        $user = User::findOrFail($id);
        return view('UpdateFormUser', compact('user'));
    }

    public function mainPageView()
    {
        return view('main-page');
    }
}
