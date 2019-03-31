<?php

	require '../vendor/autoload.php';

	// loading env variables
	Dotenv\Dotenv::create(dirname(__DIR__))->load();

	require_once 'config/config.php';

	// Automatically load libraries
	spl_autoload_register(function($className) {
		require_once __DIR__ . '\\..\\vendor\\nirav\\ninja-php\\lib\\' . $className . '.php';
	});