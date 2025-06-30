<?php

declare(strict_types=1);

namespace OrderService\DTO;

final class OrderDTO implements \JsonSerializable {

  public function __construct(
    public readonly string $orderId,
    public readonly string $productId,
    public readonly int $quantity,
    public readonly float $totalPrice,
    public readonly string $createdAt
  ) {}

  public function jsonSerialize(): array {
    return get_object_vars($this);
  }

}
