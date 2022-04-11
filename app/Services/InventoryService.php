<?php

namespace App\Services;

use App\Repositories\InventoryRepository;

class InventoryService
{
    protected $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function getInventories()
    {
        return $this->inventoryRepository->getAllInventories();
    }

    public function getInventoriesToMaintenance()
    {
        return $this->inventoryRepository->getAllInventoriesToMaintenance();
    }

    public function createNewInventory(array $data)
    {
        return $this->inventoryRepository->createNewInventory($data);
    }

    public function getInventory(string $identify)
    {
        return $this->inventoryRepository->getInventoryByUuid($identify);
    }

    public function deleteInventory(string $identify)
    {
        return $this->inventoryRepository->deleteInventoryByUuid($identify);
    }

    public function updateInventory(string $identify, array $data)
    {
        return $this->inventoryRepository->updateInventoryByUuid($identify, $data);
    }
}
