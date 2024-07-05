<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    
    public function createFollow(User $user) {

        if ($user->id == auth()->user()->id) {
            return back()->with('error', 'You are not able to follow yourself');
        }

        $alreadyFollowed = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();

        if ($alreadyFollowed) {
            return back()->with('error', 'You are already following this user');
        }

        $newFollow = new Follow();
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return back()->with('success', 'User succesfully followed');
    }

    
    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        return back()->with('success', 'User succesfully unfollowed');
    }
}
