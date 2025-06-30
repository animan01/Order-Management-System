import { products } from '../data/products.js';

export async function findAllProducts() {
  return products;
}

export async function findProductById(id) {
  return products.find(p => p.id === id);
}