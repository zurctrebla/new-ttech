<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $repository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function getRoles()
    {
        return $this->repository->getAllRoles();
    }

    public function createNewRole(array $data)
    {
        return $this->repository->createNewRole($data);
    }

    public function getRole(string $identify)
    {
        return $this->repository->getRoleByUuid($identify);
    }

    public function deleteRole(string $identify)
    {
        return $this->repository->deleteRoleByUuid($identify);
    }

    public function updateRole(string $identify, array $data)
    {
        return $this->repository->updateRoleByUuid($identify, $data);
    }
}
