<?php

namespace App\Repositories;

use App\Models\Device;

class DeviceRepository
{
    protected $entity;

    public function __construct(Device $device)
    {
        $this->entity = $device;
    }

    public function getAllDevices()
    {
        return $this->entity->get();
    }

    public function createNewDevice(array $data)
    {
        return $this->entity->create($data);
    }

    public function getDeviceByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteDeviceByUuid(string $identify)
    {
        $device = $this->getDeviceByUuid($identify, false);

        return $device->delete();
    }

    public function updateDeviceByUuid(string $identify, array $data)
    {
        $device = $this->getDeviceByUuid($identify, false);

        return $device->update($data);
    }
}
