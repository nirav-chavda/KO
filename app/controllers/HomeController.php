<?php

namespace App\Controllers;

use Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $this->view('home');
    }

    public function dashboard()
    {
        $this->view('dashboard');
    }
}
