<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    
    public function homePage() {
        // Imagine we loaded data from the database 
        $ourName = 'Welmann';

        $animals = ['Meowsalot', 'Kirby', 'Sylvie'];

        return view('home', ['name' => $ourName, 'catName' => 'Meowsalot', 'allAnimals' => $animals]);
    }

    public function aboutPage() {
        return view('single-post');
    }

}
