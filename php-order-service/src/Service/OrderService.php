<?php

declare(strict_types=1);

namespace OrderService\Service;

use OrderService\DTO\OrderDTO;
use OrderService\Storage\FileOrderStorage;
use OrderService\HttpClient\ProductClient;
use Ramsey\Uuid\Uuid;

final class OrderService {

  private FileOrderStorage $storage;

  private ProductClient $client;

  public function __construct() {
    $this->storage = new FileOrderStorage();
    $this->client = new ProductClient();
  }

  public function createOrder(string $productId, int $quantity): array {
    $product = $this->client->getProduct($productId);
    if (!$product) {
      throw new \RuntimeException('Product not found');
    }

    $order = new OrderDTO(
      Uuid::uuid4()->toString(),
      $productId,
      $quantity,
      $product['price'] * $quantity,
      date('c')
    );

    $this->storage->addOrder($order);
    return $order->jsonSerialize();
  }

  public function getOrders(): array {
    return $this->storage->getAllOrders();
  }

}
