<?php

	require '../vendor/autoload.php';
	require_once __DIR__ . '\\..\\vendor\\nirav\\ninja-php\\lib\\Helpers.php';

	// loading env variables
	Dotenv\Dotenv::create(dirname(__DIR__))->load();
	
	use Ninja\Session;

	require_once 'config/config.php';

	// Automatically load libraries
	spl_autoload_register(function($className) {
		if(file_exists(__DIR__ . '\\..\\vendor\\nirav\\ninja-php\\lib\\' . $className . '.php')) {
			require_once __DIR__ . '\\..\\vendor\\nirav\\ninja-php\\lib\\' . $className . '.php';
		}
	});

