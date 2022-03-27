<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLocator;
use App\Http\Resources\LocatorResource;
use App\Services\LocatorService;

class LocatorController extends Controller
{
    protected $locatorService;

    public function __construct(LocatorService $locatorService)
    {
        $this->locatorService = $locatorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locators = $this->locatorService->getLocators();
        return LocatorResource::collection($locators);
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
        return new LocatorResource($locator);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $locator = $this->locatorService->getLocator($identify);
        return new LocatorResource($locator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateLocator $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLocator $request, $identify)
    {
        $this->locatorService->updateLocator($identify, $request->validated());
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
        $this->locatorService->deleteLocator($identify);
        return response()->json([], 204);
    }
}
