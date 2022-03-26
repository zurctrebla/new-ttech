<?php

namespace App\Services;

use App\Repositories\DeviceRepository;

class DeviceService
{
    protected $repository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->repository = $deviceRepository;
    }

    public function getDevices()
    {
        return $this->repository->getAllDevices();
    }

    public function createNewDevice(array $data)
    {
        return $this->repository->createNewDevice($data);
    }

    public function getDevice(string $identify)
    {
        return $this->repository->getDeviceByUuid($identify);
    }

    public function deleteDevice(string $identify)
    {
        return $this->repository->deleteDeviceByUuid($identify);
    }

    public function updateDevice(string $identify, array $data)
    {
        return $this->repository->updateDeviceByUuid($identify, $data);
    }
}
