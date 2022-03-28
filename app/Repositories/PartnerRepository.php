<?php

namespace App\Repositories;

use App\Models\User;

class PartnerRepository
{
    protected $entity;

    public function __construct(User $partner)
    {
        $this->entity = $partner;
    }

    public function getAllPartners()
    {
        return $this->entity->get();
    }

    public function createNewPartner(array $data)
    {
        return $this->entity->create($data);
    }

    public function getPartnerByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deletePartnerByUuid(string $identify)
    {
        $partner = $this->getPartnerByUuid($identify, false);

        return $partner->delete();
    }

    public function updatePartnerByUuid(string $identify, array $data)
    {
        $partner = $this->getPartnerByUuid($identify, false);

        return $partner->update($data);
    }
}
