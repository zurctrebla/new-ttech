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

    public function getAllInventoriesToMaintenance()
    {
        return $this->entity->where('export', 'Y')->where('status', 'Ativo')->get();
    }

    public function createNewInventory(array $data)
    {
        $inventory = $this->entity->create($data);
        return $inventory->logs()->create([
            'after' => "0",
            'before' => $data['amount'],
            'user_id' => $inventory->user_id,
        ]);
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
