<?php

declare(strict_types=1);

namespace OrderService\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use OrderService\Service\OrderService;

final class OrderController {

  private OrderService $orderService;

  public function __construct() {
    $this->orderService = new OrderService();
  }

  public function createOrder(Request $request, Response $response): Response {
    $data = $request->getParsedBody();
    $productId = $data['productId'] ?? NULL;
    $quantity = $data['quantity'] ?? NULL;

    if (!$productId || !$quantity) {
      $response->getBody()
        ->write(json_encode(['message' => 'productId and quantity are required']));
      return $response->withStatus(400)
        ->withHeader('Content-Type', 'application/json');
    }

    try {
      $order = $this->orderService->createOrder($productId, (int) $quantity);
    }
    catch (\RuntimeException $e) {
      $response->getBody()->write(json_encode(['message' => $e->getMessage()]));
      return $response->withStatus(404)
        ->withHeader('Content-Type', 'application/json');
    }

    $response->getBody()->write(json_encode($order));
    return $response->withHeader('Content-Type', 'application/json');
  }

  public function listOrders(Request $request, Response $response): Response {
    $orders = $this->orderService->getOrders();
    $response->getBody()->write(json_encode($orders));
    return $response->withHeader('Content-Type', 'application/json');
  }

}
