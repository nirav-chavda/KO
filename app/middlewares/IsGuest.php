<?php

namespace App\Middlewares;

use Ninja\Auth;

class IsGuest {
    public function __construct() {
        if(!Auth::guest())
            redirect_back();
    }
    
    public function handle(Closure $next) {
        return $next();
    }
}
