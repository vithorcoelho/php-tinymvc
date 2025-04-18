<?php

$router->get('/', App\Controllers\HelloWorld::class);
$router->get('/about-me', [App\Controllers\HelloWorld::class, 'aboutMe']);
