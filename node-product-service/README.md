# Product Service (Node.js)

## Description
Product catalog with REST endpoints for Order Service (PHP).

## Setup
```bash
cd node-product-service
npm install
```

## Run
```bash
npm start
```

## Endpoints
| Method | Endpoint          | Description            |
|--------|-------------------|------------------------|
| GET    | /products         | List all products      |
| GET    | /products/{id}    | Retrieve product by ID |

## Example
```bash
curl http://localhost:3000/products
```
