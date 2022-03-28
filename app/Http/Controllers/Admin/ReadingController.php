<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateReading;
use App\Http\Resources\{
    LocatorResource,
    PartnerResource,
    ReadingResource
};
use App\Services\LocatorService;
use App\Services\PartnerService;
use App\Services\ReadingService;

class ReadingController extends Controller
{
    protected $readingService;

    public function __construct(
        LocatorService $locatorService,
        ReadingService $readingService,
        PartnerService $partnerService)
    {
        $this->locatorService = $locatorService;
        $this->readingService = $readingService;
        $this->partnerService = $partnerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readings = $this->readingService->getReadings();
        $readings = ReadingResource::collection($readings);
        return view('admin.pages.readings.index', compact('readings'));
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

        $locators = $this->locatorService->getLocators();
        $locators = LocatorResource::collection($locators);

        return view('admin.pages.readings.create', compact('partners', 'locators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateReading $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateReading $request)
    {
        $reading = $this->readingService->createNewReading($request->validated());
        $reading = new ReadingResource($reading);
        return redirect()->route('readings.index')->with('message', 'Leitura criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        //
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
     * @param  \Illuminate\Http\StoreUpdateReading $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateReading $request, $identify)
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
