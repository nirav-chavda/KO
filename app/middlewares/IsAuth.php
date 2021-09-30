<?php

namespace App\Middlewares;

use Ninja\Auth;

class IsAuth {
    public function __construct() {
        if(Auth::guest()) {
            redirect('auth/login');
        }
    }
}