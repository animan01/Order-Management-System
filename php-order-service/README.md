# Order Service (PHP)

## Description
Storing and creating orders for Product Service (Node.js).

## Prerequisites
- PHP 8.1+
- Composer

## Setup
```bash
cd php-order-service
composer install
cp .env.example .env
```

## Configuration
Edit `.env` if the Product Service is not running on the default URL:

```
PRODUCT_SERVICE_URL=http://localhost:3000
```

## Run
```bash
php -S localhost:8080 -t public
```

## Endpoints
| Method | Endpoint | Description        |
|--------|----------|--------------------|
| POST   | /orders  | Create a new order |
| GET    | /orders  | List all orders    |

### POST /orders body
```json
{
  "productId": "<uuid-from-product-service>",
  "quantity": 2
}
```

## Example
```bash
curl -X POST http://localhost:8080/orders \
  -H "Content-Type: application/json" \
  -d '{"productId":"<uuid>", "quantity":3}'
```
