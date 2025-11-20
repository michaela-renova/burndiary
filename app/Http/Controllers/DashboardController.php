<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function dashboard()
    {
        $posts = auth()->user()->posts()->latest()->get();

        return view('dashboard', ['posts' => $posts]);
    }

    public function index()
    {
        return view('home');
    }

}
