<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function alreadyFollowedCheck(User $user) : Array {
        $alreadyFollowed = 0;

        if (auth()->user()){
            $alreadyFollowed = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();  
        } 
        
        return ['user' => $user, 'alreadyFollowed' => $alreadyFollowed];
    }
    
    public function profile(User $user) {
        return view('profile-posts', $this->alreadyFollowedCheck($user));
    }

    public function profileFollowers(User $user){
        return view('profile-followers', $this->alreadyFollowedCheck($user));
    }

    public function profileFollowing(User $user){
        return view('profile-following', $this->alreadyFollowedCheck($user));
    }

    
}
