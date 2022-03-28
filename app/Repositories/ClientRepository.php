<?php

namespace App\Repositories;

use App\Models\User;

class ClientRepository
{
    protected $entity;

    public function __construct(User $client)
    {
        $this->entity = $client;
    }

    public function getAllClients()
    {
        return $this->entity->get();
    }

    public function createNewClient(array $data)
    {
        return $this->entity->create($data);
    }

    public function getClientByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteClientByUuid(string $identify)
    {
        $client = $this->getClientByUuid($identify, false);
        return $client->delete();
    }

    public function updateClientByUuid(string $identify, array $data)
    {
        $client = $this->getClientByUuid($identify, false);
        return $client->update($data);
    }
}
