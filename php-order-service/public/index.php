<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use OrderService\Controller\OrderController;

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$controller = new OrderController();

$app->post('/orders', [$controller, 'createOrder']);
$app->get('/orders', [$controller, 'listOrders']);

$app->run();
