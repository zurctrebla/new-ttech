<?php

namespace App\Http\Controllers\Admin\ACL;

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
        $roles =  RoleResource::collection($roles);
        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
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
        return redirect()->route('roles.index')->with('message', 'Nível de Acesso criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $role = $this->roleService->getRole($identify);
        $role = new RoleResource($role);
        return view('admin.pages.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $role = $this->roleService->getRole($identify);
        $role = new RoleResource($role);
        return view('admin.pages.roles.edit', compact('role'));
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
        return redirect()->route('roles.index')->with('message', 'Nível de Acesso editado com sucesso');
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
        return redirect()->route('roles.index')->with('message', 'Nível de Acesso deletado com sucesso');
    }
}
