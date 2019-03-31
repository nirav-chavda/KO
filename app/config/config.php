<?php

    # APP PARAMS

    define('APP_NAME', getenv('APP_NAME','NinjaPHP'));

    define('APP_ENV', getenv('APP_ENV','local'));

    define('APP_URL' , getenv('APP_URL','http://localhost/'));

    # DATABASE PARAMS

    define('DB_DRIVER', strtolower(getenv('DB_CONNECTION')));

    define('DB_HOST', getenv('DB_HOST'));
    
    define('DB_PORT', getenv('DB_PORT'));

    define('DB_DATABASE', getenv('DB_DATABASE'));

    define('DB_USERNAME', getenv('DB_USERNAME'));

    define('DB_PASSWORD', getenv('DB_PASSWORD'));

    function public_path() {
        return APP_URL . 'public/';
    }

    function app_path() {
        return APP_URL . 'app/';
    }