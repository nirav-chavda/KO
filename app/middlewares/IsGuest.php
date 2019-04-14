<?php

namespace App\Middlewares;

use Ninja\Auth;

class IsGuest {
    public function __construct() {
        if(!Auth::guest())
            redirect('/');
    }
}