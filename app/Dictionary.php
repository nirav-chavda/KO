<?php
/** 
 * It has aliases of the middleware classes
 */

namespace App;

class Dictionary
{
    public $middlewareDictionary = [
        'auth' => \App\Middlewares\IsAuth::class,
        'guest' => \App\Middlewares\IsGuest::class,
    ];
};
