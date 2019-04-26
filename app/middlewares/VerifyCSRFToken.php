<?php

namespace App\Middlewares;

class VerifyCSRFToken {
    
    # Array of routes for which this middleware will be disabled
    public $except = [];

}