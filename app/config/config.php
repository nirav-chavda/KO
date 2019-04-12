<?php

    # APP PARAMS

    define('APP_NAME', env('APP_NAME','NinjaPHP'));

    define('APP_ENV', env('APP_ENV','local'));

    define('APP_URL' , env('APP_URL','http://localhost/'));

    define('APP_ROOT' , env('APP_ROOT','http://localhost/'));

    # DATABASE PARAMS

    define('DB_DRIVER', strtolower(env('DB_CONNECTION')));

    define('DB_HOST', env('DB_HOST'));
    
    define('DB_PORT', env('DB_PORT'));

    define('DB_DATABASE', env('DB_DATABASE'));

    define('DB_USERNAME', env('DB_USERNAME'));

    define('DB_PASSWORD', env('DB_PASSWORD'));