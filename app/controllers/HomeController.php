<?php

namespace App\Controllers;

use Controller;
use Ninja\Auth;

class HomeController extends Controller {

    public function index() {
        $this->view('home');
    }

    public function dashboard() {
        if(Auth::guest())
            redirect('auth/login');
        else
            $this->view('dashboard');
    }
}
