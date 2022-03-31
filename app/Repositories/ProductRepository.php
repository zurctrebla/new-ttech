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
        if ($data['inicial'] === $data['final'])    // apenas uma etiqueta, testado, ok
            $data['tag'] = $data['inicial'];

        if ($data['inicial'] != $data['final']) {   // múltiplas etiquetas

            $data['tag'] = [];

            for ($i=$data['inicial']; $i <= $data['final']; $i++) {

                $data['tag'] = $i;
                $this->entity->create($data);
            }

            return ;
        }

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
