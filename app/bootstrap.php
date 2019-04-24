<?php

	require __DIR__ . '\\..\\vendor\\autoload.php';
	require_once __DIR__ . '\\..\\vendor\\nirav\\ninja-php\\lib\\Helpers.php';

	use Illuminate\Database\Capsule\Manager as Capsule;

	# loading env variables
	Dotenv\Dotenv::create(dirname(__DIR__))->load();
	
	use Ninja\Session;

	require_once 'config/config.php';

	$capsule = new Capsule;

	$capsule->addConnection([

		"driver" => env('DB_CONNECTION'),

		"host" => env('DB_HOST'),

		"database" => env('DB_DATABASE'),

		"username" => env('DB_USERNAME'),

		"password" => env('DB_PASSWORD')

	]);

	# Set the event dispatcher used by Eloquent models
	use Illuminate\Events\Dispatcher;
	use Illuminate\Container\Container;
	$capsule->setEventDispatcher(new Dispatcher(new Container));

	# Make this Capsule instance available globally via static methods... (optional)
	$capsule->setAsGlobal();

	# Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
	$capsule->bootEloquent();

