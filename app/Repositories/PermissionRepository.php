<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository
{
    protected $entity;

    public function __construct(Permission $permission)
    {
        $this->entity = $permission;
    }

    public function getAllPermissions()
    {
        return $this->entity->get();
    }

    public function createNewPermission(array $data)
    {
        return $this->entity->create($data);
    }

    public function getPermissionByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deletePermissionByUuid(string $identify)
    {
        $permission = $this->getPermissionByUuid($identify, false);

        return $permission->delete();
    }

    public function updatePermissionByUuid(string $identify, array $data)
    {
        $permission = $this->getPermissionByUuid($identify, false);

        return $permission->update($data);
    }
}
