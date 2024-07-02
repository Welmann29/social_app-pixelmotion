<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function homePage() {
        if (auth()->check()) {
            return view('home-feed');
        } else {
            return view('home');
        }
    }
}
