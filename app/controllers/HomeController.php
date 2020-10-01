<?php

namespace App\Controllers;

use Controller;
use Ninja\Request;

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
    
    public function getBody(Request $request)
    {
        $this->view('dashboard');
    }
}
