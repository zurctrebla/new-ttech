<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    protected $entity;

    public function __construct(Role $role)
    {
        $this->entity = $role;
    }

    public function getAllRoles()
    {
        return $this->entity->get();
    }

    public function createNewRole(array $data)
    {
        return $this->entity->create($data);
    }

    public function getRoleByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteRoleByUuid(string $identify)
    {
        $role = $this->getRoleByUuid($identify, false);

        return $role->delete();
    }

    public function updateRoleByUuid(string $identify, array $data)
    {
        $role = $this->getRoleByUuid($identify, false);

        return $role->update($data);
    }
}
