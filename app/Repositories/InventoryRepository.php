<?php

namespace App\Repositories;

use App\Models\Inventory;

class InventoryRepository
{
    protected $entity;

    public function __construct(Inventory $inventory)
    {
        $this->entity = $inventory;
    }

    public function getAllInventories()
    {
        return $this->entity->get();
    }

    public function createNewInventory(array $data)
    {
        return $this->entity->create($data);
    }

    public function getInventoryByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteInventoryByUuid(string $identify)
    {
        $inventory = $this->getInventoryByUuid($identify, false);

        return $inventory->delete();
    }

    public function updateInventoryByUuid(string $identify, array $data)
    {
        $inventory = $this->getInventoryByUuid($identify, false);

        return $inventory->update($data);
    }
}
