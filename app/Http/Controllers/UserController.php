<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;

class UserController extends Controller
{
    public function register(NewUserRequest $request) {
        $fields = $request->validated();

        $fields['password'] = bcrypt($fields['password']);

        User::create($fields);
        return 'Hello from register function';
    }
}
