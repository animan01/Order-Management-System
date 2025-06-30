import asyncHandler from 'express-async-handler';
import {
  findAllProducts,
  findProductById,
} from '../services/productService.js';

export const getProducts = asyncHandler(async (req, res) => {
  const list = await findAllProducts();
  res.json(list);
});

export const getProductById = asyncHandler(async (req, res) => {
  const product = await findProductById(req.params.id);
  if (!product) {
    res.status(404);
    throw new Error('Product not found');
  }
  res.json(product);
});