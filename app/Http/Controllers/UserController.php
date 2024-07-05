<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Http\Requests\NewUserRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\NewProfilPictureRequest;

class UserController extends Controller
{
    public function register(NewUserRequest $request) {
        $fields = $request->validated();

        $fields['password'] = bcrypt($fields['password']);
        $fields['avatar'] = '';

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

    public function showAvatarForm() {
        return view('avatar-form');
    }

    public function savePicture(NewProfilPictureRequest $request) {
        $request->validated();

        $user = auth()->user();
        $filename = $user->id . Carbon::now()->valueOf() . ".jpg";

        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('avatar'));
        $imgData = $image->cover(120, 120)->toJpeg();
        Storage::put("public/avatars/{$user->username}/{$filename}", $imgData);

        $user->avatar = $filename;
        $user->save();

        return redirect("/profile/{$user->username}")->with('success', 'You have succesfully changed your profile picture');
    }
}
