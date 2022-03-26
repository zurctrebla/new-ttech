<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    protected $repository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->repository = $permissionRepository;
    }

    public function getPermissions()
    {
        return $this->repository->getAllPermissions();
    }

    public function createNewPermission(array $data)
    {
        return $this->repository->createNewPermission($data);
    }

    public function getPermission(string $identify)
    {
        return $this->repository->getPermissionByUuid($identify);
    }

    public function deletePermission(string $identify)
    {
        return $this->repository->deletePermissionByUuid($identify);
    }

    public function updatePermission(string $identify, array $data)
    {
        return $this->repository->updatePermissionByUuid($identify, $data);
    }
}
