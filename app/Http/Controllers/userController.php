<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        return view('user view/user');
    }
    
    public function index2()
    {
        return view('user view/userbis2');
    }

    public function index3()
    {
        return view('user view/userbis3');
    }
}