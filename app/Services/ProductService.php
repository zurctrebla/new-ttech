<?php

namespace App\Services;

use App\Repositories\{
    InventoryRepository,
    ProductRepository
};

class ProductService
{
    protected $inventoryRepository, $productRepository;

    public function __construct(
        InventoryRepository $inventoryRepository,
        ProductRepository $productRepository
        )
    {
        $this->inventoryRepository = $inventoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function createNewProduct(array $data)
    {
        $inventory = $this->inventoryRepository->getInventoryByUuid($data['inventory']);
        $data['inventory_id'] = $inventory->id;

        if ($inventory->amount < ($data['final'] - $data['inicial']))
            return redirect()->route('products.maintenance')->with('error', 'Estoque menor que a quantidade a ser lançada');

        if ($inventory->amount <= 50)
            return redirect()->route('products.maintenance')->with('error', 'Estoque menor que a 50 unidades');

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
