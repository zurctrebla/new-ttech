<?php

namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService
{
    protected $repository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getReports()
    {
        return $this->reportRepository->getAllReports();
    }

    public function createNewReport(array $data)
    {
        return $this->reportRepository->createNewReport($data);
    }

    public function getReport(string $identify)
    {
        return $this->reportRepository->getReportByUuid($identify);
    }

    public function deleteReport(string $identify)
    {
        return $this->reportRepository->deleteReportByUuid($identify);
    }

    public function updateReport(string $identify, array $data)
    {
        return $this->reportRepository->updateReportByUuid($identify, $data);
    }
}
