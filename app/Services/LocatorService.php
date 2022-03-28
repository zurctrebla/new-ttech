<?php

namespace App\Services;

use App\Repositories\{
    LocatorRepository,
    PartnerRepository
};

class LocatorService
{
    protected $locatorRepository;

    public function __construct(
        LocatorRepository $locatorRepository,
        PartnerRepository $partnerRepository
        )
    {
        $this->locatorRepository = $locatorRepository;
        $this->partnerRepository = $partnerRepository;
    }

    public function getLocators()
    {
        return $this->locatorRepository->getAllLocators();
    }

    public function createNewLocator(array $data)
    {
        dd($data);
        $partner = $this->partnerRepository->getPartnerByUuid($data['partner']);

        dd($data['partner']);

        return $this->locatorRepository->createNewLocator($partner->id, $data);
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
