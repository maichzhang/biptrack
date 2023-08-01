<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class userBKController extends Controller
{
    public function index()
    {
        return view('user view/userBK');
        
    }
    
    public function index2()
    {
        return view('user view/userBK2');
    }
}