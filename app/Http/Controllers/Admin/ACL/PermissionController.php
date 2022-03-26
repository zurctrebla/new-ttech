<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Http\Resources\PermissionResource;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionService->getPermissions();
        $permissions = PermissionResource::collection($permissions);
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermission $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        $permission = $this->permissionService->createNewPermission($request->validated());
        $permission = new PermissionResource($permission);
        return redirect()->route('permissions.index')->with('message', 'Permissão criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $permission = $this->permissionService->getPermission($identify);
        $permission = new PermissionResource($permission);
        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermission $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $identify)
    {
        $this->permissionService->updatePermission($identify, $request->validated());
        return redirect()->route('permissions.index')->with('message', 'Permissão editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->permissionService->deletePermission($identify);
        return redirect()->route('permissions.index')->with('message', 'Permissão editada com sucesso');
    }
}
