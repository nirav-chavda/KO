<?php
/** 
 * It has aliases of the middleware classes
 */

namespace App;
use Closure;

class Dictionary
{
    public $middlewareDictionary = [
        'auth' => \App\Middlewares\IsAuth::class,
        'guest' => \App\Middlewares\IsGuest::class,
    ];
    
    public function handle(Closure $next)
    {
        return next();   
    }
};
