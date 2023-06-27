<?php

require_once __DIR__ . '/vendor/autoload.php';

use API\controllers\Controller;

$endpoint = new Controller();

$path = $_SERVER['PATH_INFO'];
$method = $_SERVER['REQUEST_METHOD'];
$lat = $_GET['latitude'];
$long = $_GET['longitude'];

if($method == 'GET' && $path  == '/get-data-from-location')
    $endpoint->handle($lat, $long);
else 
{
    header('Content-Type: application/json');
    if ($method != 'GET')
    {
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
    }
    
    if ($path != '/get-data-from-location')
    {
        http_response_code(404);
        echo json_encode(['error' => 'Page not found']);
    }
}



