<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function getAllOrders()
    {
        return $this->entity->get();
    }

    public function createNewOrder(array $data)
    {
        return $this->entity->create($data);
    }

    public function getOrderByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteOrderByUuid(string $identify)
    {
        $order = $this->getOrderByUuid($identify, false);

        return $order->delete();
    }

    public function updateOrderByUuid(string $identify, array $data)
    {
        $order = $this->getOrderByUuid($identify, false);

        return $order->update($data);
    }
}
