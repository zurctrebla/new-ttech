<?php

namespace App\Http\Controllers\Api\ACL;

use App\Http\Controllers\Controller;
use App\Services\{
    PermissionService,
    RoleService
};
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $roleService;

    public function __construct(
        RoleService $roleService,
        PermissionService $permissionService
        )
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions($identify)
    {
        $role = $this->roleService->getRole($identify);
        $permissions = $this->permissionService->getPermissions();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function permissionsAvailable(Request $request, $identify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function attachPermissionsRole(Request $request, $identify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function detachPermissionRole($idRole, $identify)
    {
        //
    }
}
