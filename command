#!/usr/bin/env php
<?php

    require __DIR__ . '/vendor/autoload.php';

    use Symfony\Component\Console\Application;

    $application = new Application();

    # add our commands
    $application->add(new ServeCommand());
    $application->add(new MakeControllerCommand());
    $application->add(new MakeModelCommand());
    $application->add(new MakeTableCommand());
    $application->add(new DBMoveCommand());

    $application->run();