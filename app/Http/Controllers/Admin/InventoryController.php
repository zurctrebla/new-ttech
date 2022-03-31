<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateInventory;
use App\Http\Resources\InventoryResource;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    protected $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = $this->inventoryService->getinventories();
        $inventories = InventoryResource::collection($inventories);
        return view('admin.pages.inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateInventory $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateInventory $request)
    {
        $inventory = $this->inventoryService->createNewInventory($request->validated());
        $inventory = new InventoryResource($inventory);
        return redirect()->route('inventories.index')->with('message', 'Equipamento criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $inventory = $this->inventoryService->getInventory($identify);
        $inventory = new InventoryResource($inventory);
        return view('admin.pages.inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateInventory $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateInventory $request, $identify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        //
    }
}
