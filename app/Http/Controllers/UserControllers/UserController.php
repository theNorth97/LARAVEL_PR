<?php

namespace App\Http\Controllers\UserControllers;

use App\Facades\UserFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserControllers\Values\UserCreate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// class UserController extends Controller
// {
//     public function createUser(Request $request)
//     {
//         $data = $request->all();
//         $values = new UserCreate($data['name'], $data['email'], $data['password']);
//         $facade = new UserFacade();
//         $facade->createUser($values);
//     }
// }

class UserController extends Controller
{
    public function showFormCreateUser()
    {
        return view('showFormCreateUser');
    }


    public function createUser(Request $request)
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


    public function showAllUsers()
    {
        $users = User::all();
        return view('showAllUsers', compact('users'));
    }
}
