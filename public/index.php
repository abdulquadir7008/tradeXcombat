<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoload (note the ../ to go up to project root)
require __DIR__.'/../vendor/autoload.php';

// Bootstrap the application
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle request
$response = $app->handle(
    $request = Request::capture()
);

$response->send();
$app->terminate($request, $response);
