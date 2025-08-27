<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show user homepage
     */
    public function index()
    {
        return view('user.home');
    }


}
