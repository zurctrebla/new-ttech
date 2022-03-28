<?php

namespace App\Services;

use App\Repositories\PartnerRepository;

class PartnerService
{
    protected $repository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->repository = $partnerRepository;
    }

    public function getPartners()
    {
        return $this->repository->getAllPartners();
    }

    public function createNewPartner(array $data)
    {
        return $this->repository->createNewPartner($data);
    }

    public function getPartner(string $identify)
    {
        return $this->repository->getPartnerByUuid($identify);
    }

    public function deletePartner(string $identify)
    {
        return $this->repository->deletePartnerByUuid($identify);
    }

    public function updatePartner(string $identify, array $data)
    {
        return $this->repository->updatePartnerByUuid($identify, $data);
    }
}
