<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewUserRequest;

class UserController extends Controller
{
    public function register(NewUserRequest $request) {
        $fields = $request->validated();

        $fields['password'] = bcrypt($fields['password']);

        $newUser = User::create($fields);

        auth()->login($newUser);

        return redirect('/')->with('success', 'You have created a new account. Enjoy the app!!');
    }

    public function login(LoginRequest $request) {
        $fields = $request->validated();

        if (auth()->attempt(['username' => $fields['loginusername'],
                            'password' => $fields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have successfully logged in');                    
        } else {
            return redirect('/')->with('error', 'Invalid credentials.'); 
        }

    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You have successfully logged out');
    }
}
