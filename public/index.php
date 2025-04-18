<?php

use Illuminate\Http\Request;

$router = require __DIR__ . '/../core/bootstrap.php';
require __DIR__ . '/../config/routes.php';

$request = Request::capture();

try {
    $response = $router->dispatch($request);
    $response->send();
} catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
    require_once __DIR__ . '/../core/helpers.php';
    render404();
}