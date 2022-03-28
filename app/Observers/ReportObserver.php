<?php

namespace App\Observers;

use App\Models\Report;
use Illuminate\Support\Str;

class ReportObserver
{
    /**
     * Handle the Report "creating" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function creating(Report $report)
    {
        $report->user_id = Auth()->user()->id;
        $report->uuid = Str::uuid();
        // $report->status = 'Aberto';
    }

    /**
     * Handle the Report "updated" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function updated(Report $report)
    {
        //
    }

    /**
     * Handle the Report "deleted" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function deleted(Report $report)
    {
        //
    }

    /**
     * Handle the Report "restored" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function restored(Report $report)
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function forceDeleted(Report $report)
    {
        //
    }
}
