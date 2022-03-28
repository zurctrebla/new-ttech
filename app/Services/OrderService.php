<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $repository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function createNewOrder(array $data)
    {
        return $this->orderRepository->createNewOrder($data);
    }

    public function getOrder(string $identify)
    {
        return $this->orderRepository->getOrderByUuid($identify);
    }

    public function deleteOrder(string $identify)
    {
        return $this->orderRepository->deleteOrderByUuid($identify);
    }

    public function updateOrder(string $identify, array $data)
    {
        return $this->orderRepository->updateOrderByUuid($identify, $data);
    }
}
