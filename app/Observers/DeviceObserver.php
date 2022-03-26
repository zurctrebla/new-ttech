<?php

namespace App\Observers;

use App\Models\Device;
use Illuminate\Support\Str;

class DeviceObserver
{
    /**
     * Handle the Device "creating" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function creating(Device $device)
    {
        $device->uuid = Str::uuid();
    }

    /**
     * Handle the Device "updated" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function updated(Device $device)
    {
        //
    }

    /**
     * Handle the Device "deleted" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function deleted(Device $device)
    {
        //
    }

    /**
     * Handle the Device "restored" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function restored(Device $device)
    {
        //
    }

    /**
     * Handle the Device "force deleted" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function forceDeleted(Device $device)
    {
        //
    }
}
