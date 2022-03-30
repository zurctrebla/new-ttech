<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\{
    InventoryResource,
    ProductResource,
    ReportResource
};
use App\Services\{
    InventoryService,
    ProductService,
    ReportService
};

use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportService, $inventoryService;

    public function __construct(
        InventoryService $inventoryService,
        ReportService $reportService
        )
    {
        $this->inventoryService = $inventoryService;
        $this->reportService = $reportService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = $this->reportService->getReports();
        $reports = ReportResource::collection($reports);
        return view('admin.pages.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = $this->inventoryService->getInventories();
        $inventories = InventoryResource::collection($inventories);
        return view('admin.pages.reports.create', compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = $this->reportService->createNewReport($request->validated());
        return new ReportResource($report);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $report = $this->reportService->getReport($identify);
        return new ReportResource($report);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identify)
    {
        $this->reportService->updateReport($identify, $request->validated());
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
        $this->reportService->deleteReport($identify);
        return response()->json([], 204);
    }
}
