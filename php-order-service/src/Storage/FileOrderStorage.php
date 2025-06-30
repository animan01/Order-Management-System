<?php

declare(strict_types=1);

namespace OrderService\Storage;

use OrderService\DTO\OrderDTO;

final class FileOrderStorage {

  private const FILE = __DIR__ . '/../../data/orders.json';

  private array $orders = [];

  public function __construct() {
    if (file_exists(self::FILE)) {
      $this->orders = json_decode((string) file_get_contents(self::FILE), TRUE) ?? [];
    }
  }

  public function addOrder(OrderDTO $order): void {
    $this->orders[] = $order;
    $this->flush();
  }

  public function getAllOrders(): array {
    return $this->orders;
  }

  private function flush(): void {
    file_put_contents(self::FILE, json_encode($this->orders, JSON_PRETTY_PRINT));
  }

}