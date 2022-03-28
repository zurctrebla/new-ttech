<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateReport;
use App\Http\Resources\ReportResource;
use App\Services\ReportService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
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
        return ReportResource::collection($reports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateReport $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateReport $request)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateReport $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateReport $request, $identify)
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
