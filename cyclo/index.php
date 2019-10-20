<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/model/ActivityManager.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();


$app->GET('/api/v1/activities/findByYear/{year}', function(Application $app, Request $request, $year) {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'develop';
    $charset = 'utf8mb4';
   // $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // $db = new PDO('mysql:host=".$dbhost.";dbname=".$dbname."', $dbuser, '');
    $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$charset";
    echo "la DSN est ".$dsn;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
    $db = new PDO($dsn, $dbuser, $dbpass, $options);
   // echo "le PDO est ".$db->;
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
    $manager = new ActivityManager($db);
    $response = $manager->getActivitiesByYear($year);
    return new Response($response);
            });


$app->run();
