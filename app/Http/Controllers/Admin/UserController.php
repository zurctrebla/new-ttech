<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\{
    RoleResource,
    UserResource

};
use App\Services\RoleService;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(
        UserService $userService,
        RoleService $roleService
        )
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUsers();
        $users = UserResource::collection($users);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->getRoles();
        $roles =  RoleResource::collection($roles);
        return view('admin.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $user = $this->userService->createNewUser($request->validated());
        // return new UserResource($user);
        return redirect()->route('users.index')->with('message', 'Usuário criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $user = $this->userService->getUser($identify);
        $user = new UserResource($user);
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $user = $this->userService->getUser($identify);
        $user = new UserResource($user);
        $roles = $this->roleService->getRoles();
        $roles =  RoleResource::collection($roles);
        return view('admin.pages.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $identify)
    {
        // dd($request);
        $this->userService->updateUser($identify, $request->validated());
        // return response()->json(['message' => 'updated']);
        return redirect()->route('users.index')->with('message', 'Usuário editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->userService->deleteUser($identify);
        // return response()->json([], 204);
        return redirect()->route('users.index')->with('message', 'Usuário deletado com sucesso');
    }
}
