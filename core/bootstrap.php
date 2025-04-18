<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Routing\Contracts\CallableDispatcher as CallableDispatcherContract;
use Illuminate\Routing\CallableDispatcher;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/constants.php';

// Configuração do Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../app/Views');
$twig = new \Twig\Environment($loader, [
    'cache' => false, // Altere para um diretório de cache em produção
]);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$container = new Container();
Container::setInstance($container);
$container->bind(CallableDispatcherContract::class, CallableDispatcher::class);
$events = new Dispatcher($container);
$router = new Router($events, $container);

return $router;