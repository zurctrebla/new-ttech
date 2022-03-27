<?php

namespace App\Repositories;

use App\Models\Locator;

class LocatorRepository
{
    protected $entity;

    public function __construct(Locator $locator)
    {
        $this->entity = $locator;
    }

    public function getAllLocators()
    {
        return $this->entity->get();
    }

    public function createNewLocator(array $data)
    {
        return $this->entity->create($data);
    }

    public function getLocatorByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteLocatorByUuid(string $identify)
    {
        $locator = $this->getLocatorByUuid($identify, false);

        return $locator->delete();
    }

    public function updateLocatorByUuid(string $identify, array $data)
    {
        $locator = $this->getLocatorByUuid($identify, false);

        return $locator->update($data);
    }
}
