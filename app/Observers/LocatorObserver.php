<?php

namespace App\Observers;

use App\Models\Locator;
use Illuminate\Support\Str;

class LocatorObserver
{
    /**
     * Handle the Locator "creating" event.
     *
     * @param  \App\Models\Locator  $locator
     * @return void
     */
    public function creating(Locator $locator)
    {
        $locator->user_id = Auth()->user()->id;
        $locator->uuid = Str::uuid();
        $locator->status = 'Ativo';
    }

    /**
     * Handle the Locator "updated" event.
     *
     * @param  \App\Models\Locator  $locator
     * @return void
     */
    public function updated(Locator $locator)
    {
        //
    }

    /**
     * Handle the Locator "deleted" event.
     *
     * @param  \App\Models\Locator  $locator
     * @return void
     */
    public function deleted(Locator $locator)
    {
        //
    }

    /**
     * Handle the Locator "restored" event.
     *
     * @param  \App\Models\Locator  $locator
     * @return void
     */
    public function restored(Locator $locator)
    {
        //
    }

    /**
     * Handle the Locator "force deleted" event.
     *
     * @param  \App\Models\Locator  $locator
     * @return void
     */
    public function forceDeleted(Locator $locator)
    {
        //
    }
}
