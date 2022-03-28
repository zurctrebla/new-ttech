<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getAllProducts()
    {
        return $this->entity->get();
    }

    public function createNewProduct(array $data)
    {
        return $this->entity->create($data);
    }

    public function getProductByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteProductByUuid(string $identify)
    {
        $product = $this->getProductByUuid($identify, false);

        return $product->delete();
    }

    public function updateProductByUuid(string $identify, array $data)
    {
        $product = $this->getProductByUuid($identify, false);

        return $product->update($data);
    }
}
