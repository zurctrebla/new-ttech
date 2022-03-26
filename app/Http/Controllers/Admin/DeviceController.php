<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDevice;
use App\Http\Resources\DeviceResource;
use App\Services\DeviceService;
use Illuminate\Http\Request;

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
        $devices = DeviceResource::collection($devices);
        return view('admin.pages.devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.devices.create');
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
        return redirect()->route('devices.index')->with('message', 'Dispositivo criado com sucesso');
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
        $device = new DeviceResource($device);
        return view('admin.pages.devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $device = $this->deviceService->getDevice($identify);
        $device = new DeviceResource($device);
        return view('admin.pages.devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $identify
     * @return \Illuminate\Http\Respons
     */
    public function update(Request $request, $identify)
    {
        $this->deviceService->updateDevice($identify, $request->validated());
        return redirect()->route('devices.index')->with('message', 'Dispositivo editado com sucesso');
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
        return redirect()->route('devices.index')->with('message', 'Dispositivo deletado com sucesso');
    }
}
