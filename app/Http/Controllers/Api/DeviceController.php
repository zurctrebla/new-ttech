<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDevice;
use App\Http\Resources\DeviceResource;
use App\Services\DeviceService;

class DeviceController extends Controller
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = $this->deviceService->getDevices();
        return DeviceResource::collection($devices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateDevice $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDevice $request)
    {
        $device = $this->deviceService->createNewDevice($request->validated());
        return new DeviceResource($device);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $device = $this->deviceService->getDevice($identify);
        return new DeviceResource($device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDevice $request, $identify)
    {
        $this->deviceService->updateDevice($identify, $request->validated());
        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->deviceService->deleteDevice($identify);
        return response()->json([], 204);
    }
}
