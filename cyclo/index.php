<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();


$app->GET('/api/v1/activities/findByYear/{year}', function(Application $app, Request $request, $year) {
            return new Response('How about implementing findActivitiesByYear as a GET method ? mange du crabe ta dis '.$year);
            });


$app->run();
