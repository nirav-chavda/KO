<?php

namespace App\Middlewares;

use Ninja\Auth;

class IsAuth {
    public function __construct() {
        if(Auth::guest())
            redirect('auth/login');
    }
    
    public function handle(Closure $next) {
        $next();
    }
}
