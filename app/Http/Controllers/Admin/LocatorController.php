<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLocator;
use App\Http\Resources\{
    DeviceResource,
    GameResource,
    LocatorResource,
    PartnerResource,
    UserResource
};
use App\Services\{
    DeviceService,
    GameService,
    LocatorService,
    PartnerService,
    UserService
};

class LocatorController extends Controller
{
    protected $locatorService;

    public function __construct(
        DeviceService $deviceService,
        GameService $gameService,
        LocatorService $locatorService,
        PartnerService $partnerService,
        UserService $userService
        )
    {
        $this->deviceService = $deviceService;
        $this->gameService = $gameService;
        $this->locatorService = $locatorService;
        $this->userService = $userService;
        $this->partnerService = $partnerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locators = $this->locatorService->getLocators();
        $locators = LocatorResource::collection($locators);
        return view('admin.pages.locators.index', compact('locators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = $this->partnerService->getPartners();
        $partners = PartnerResource::collection($partners);
        $clients = $this->userService->getUsers();
        $clients = UserResource::collection($clients);
        $games = $this->gameService->getGames();
        $games = GameResource::collection($games);
        $devices = $this->deviceService->getDevices();
        $devices = DeviceResource::collection($devices);
        return view('admin.pages.locators.create', compact(
            'clients',
            'devices',
            'games',
            'partners'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateLocator $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLocator $request)
    {
        $locator = $this->locatorService->createNewLocator($request->validated());
        $locator = new LocatorResource($locator);
        return redirect()->route('locators.index')->with('message', 'Localizador criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $locator = $this->locatorService->getLocator($identify);
        $locator = new LocatorResource($locator);
        return view('admin.pages.locators.show', compact('locator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $locator = $this->locatorService->getLocator($identify);
        $locator = new LocatorResource($locator);
        $partners = $this->partnerService->getPartners();
        $partners = PartnerResource::collection($partners);
        $clients = $this->userService->getUsers();
        $clients = UserResource::collection($clients);
        $games = $this->gameService->getGames();
        $games = GameResource::collection($games);
        $devices = $this->deviceService->getDevices();
        $devices = DeviceResource::collection($devices);
        return view('admin.pages.locators.edit', compact(
            'clients',
            'devices',
            'games',
            'locator',
            'partners'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateLocator $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLocator $request, $identify)
    {
        $this->locatorService->updateLocator($identify, $request->validated());
        return redirect()->route('locators.index')->with('message', 'Localizador editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->locatorService->deleteLocator($identify);
        return redirect()->route('locators.index')->with('message', 'Localizador deletado com sucesso');
    }
}
