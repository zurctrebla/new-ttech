<?php

namespace App\Http\Controllers\Api\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRole;
use App\Http\Resources\RoleResource;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleService->getRoles();

        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateRole $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRole $request)
    {
        $role = $this->roleService->createNewRole($request->validated());

        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $role = $this->roleService->getRole($identify);

        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateRole $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRole $request, $identify)
    {
        $this->roleService->updateRole($identify, $request->validated());

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->roleService->deleteRole($identify);

        return response()->json([], 204);
    }
}
