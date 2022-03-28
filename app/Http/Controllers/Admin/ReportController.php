<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Services\ReportService;
use Illuminate\Http\Request;

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
        return view('admin.pages.reports.create');
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
