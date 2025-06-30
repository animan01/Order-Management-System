<?php

declare(strict_types=1);

namespace OrderService\HttpClient;

use GuzzleHttp\Client;

final class ProductClient {

  private Client $client;

  public function __construct() {
    $this->client = new Client([
      'base_uri' => getenv('PRODUCT_SERVICE_URL') ?: 'http://localhost:3000',
      'timeout' => 2.0,
    ]);
  }

  public function getProduct(string $id): ?array {
    try {
      $response = $this->client->get("/products/{$id}");
      return json_decode($response->getBody()->getContents(), TRUE);
    }
    catch (\Exception $e) {
      return NULL;
    }
  }

}
