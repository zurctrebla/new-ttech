<?php

namespace App\Services;

use App\Repositories\LocatorRepository;

class LocatorService
{
    protected $locatorRepository;

    public function __construct(LocatorRepository $locatorRepository)
    {
        $this->locatorRepository = $locatorRepository;
    }

    public function getLocators()
    {
        return $this->locatorRepository->getAllLocators();
    }

    public function createNewLocator(array $data)
    {
        // dd($data);
        return $this->locatorRepository->createNewLocator($data);
    }

    public function getLocator(string $identify)
    {
        return $this->locatorRepository->getLocatorByUuid($identify);
    }

    public function deleteLocator(string $identify)
    {
        return $this->locatorRepository->deleteLocatorByUuid($identify);
    }

    public function updateLocator(string $identify, array $data)
    {
        return $this->locatorRepository->updateLocatorByUuid($identify, $data);
    }
}
