<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Http\Resources\{
    InventoryResource,
    ProductResource
};
use App\Services\{
    InventoryService,
    ProductService
};
use DOMDocument;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(
        InventoryService $inventoryService,
        ProductService $productService)
    {
        $this->inventoryService = $inventoryService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getProducts();
        $products = ProductResource::collection($products);
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function opssa()
    {
        return view('admin.pages.products.opssa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.pages.products.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maintenance()
    {
        $inventories = $this->inventoryService->getInventories();
        $inventories = InventoryResource::collection($inventories);
        return view('admin.pages.products.maintenance', compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProduct $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file') && $request->file->isValid()) {
            $name = $request->file->getClientOriginalName();
            $data['file'] = $request->file->storeAs('files', $name); //upload file

            return redirect()->route('products.opssa')->with('message', 'Lançamento de planilha realizado com sucesso');
        }

        $product = $this->productService->createNewProduct($request->validated());
        $product = new ProductResource($product);

        return redirect()->route('products.maintenance')->with('message', 'Lançamento realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProduct $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduct $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
