<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    protected $entity;

    public function __construct(Report $report)
    {
        $this->entity = $report;
    }

    public function getAllReports()
    {
        return $this->entity->get();
    }

    public function createNewReport(array $data)
    {
        return $this->entity->create($data);
    }

    public function getReportByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteReportByUuid(string $identify)
    {
        $report = $this->getReportByUuid($identify, false);

        return $report->delete();
    }

    public function updateReportByUuid(string $identify, array $data)
    {
        $report = $this->getReportByUuid($identify, false);

        return $report->update($data);
    }
}
