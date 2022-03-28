<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function createNewProduct(array $data)
    {
        return $this->productRepository->createNewProduct($data);
    }

    public function getProduct(string $identify)
    {
        return $this->productRepository->getProductByUuid($identify);
    }

    public function deleteProduct(string $identify)
    {
        return $this->productRepository->deleteProductByUuid($identify);
    }

    public function updateProduct(string $identify, array $data)
    {
        return $this->productRepository->updateProductByUuid($identify, $data);
    }
}
