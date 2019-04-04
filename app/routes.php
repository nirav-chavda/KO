<?php
    /*
     * Array Of Routes
     * Mapping of routes
     * Method , url , Action (Controller@function)
     * Method [POST , GET]
     */
    $routes = [

        ['GET','/','HomeController@index'],
        ['GET','/auth/login','Auth/AuthController@login'],
        ['POST','/auth/login','Auth/AuthController@login'],
        ['GET','/auth/register','Auth/AuthController@register'],
        ['POST','/auth/register','Auth/AuthController@register'],
        ['GET','/dashboard','HomeController@dashboard'],
        ['POST','/auth/logout','Auth/AuthController@logout'],
    ]; 