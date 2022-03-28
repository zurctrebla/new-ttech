<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOrder;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderService->getOrders();
        $oders = OrderResource::collection($orders);
        return view('admin.pages.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateOrder $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->validated());
        $order = new OrderResource($order);
        return redirect()->route('orders.index')->with('message', 'Pedido criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $order = $this->orderService->getOrder($identify);
        $order = new OrderResource($order);
        return view('admin.pages.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $order = $this->orderService->getOrder($identify);
        $order = new OrderResource($order);
        return view('admin.pages.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateOrder $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateOrder $request, $identify)
    {
        $this->orderService->updateOrder($identify, $request->validated());
        return redirect()->route('orders.index')->with('message', 'Pedido editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->orderService->deleteOrder($identify);
        return redirect()->route('orders.index')->with('message', 'Pedido deletado com sucesso');
    }
}
