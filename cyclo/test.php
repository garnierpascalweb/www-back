<?php

require_once __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
$app = new Silex\Application();

$app->get('/', function () {
    return 'Hello world';
});

$app->run();