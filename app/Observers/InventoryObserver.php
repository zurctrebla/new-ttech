<?php

namespace App\Observers;

use App\Models\Inventory;
use Illuminate\Support\Str;

class InventoryObserver
{
    /**
     * Handle the Inventory "creating" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function creating(Inventory $inventory)
    {
        $inventory->user_id = Auth()->user()->id;
        $inventory->uuid = Str::uuid();
        $inventory->status = 'Ativo';
    }

    /**
     * Handle the Inventory "updated" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function updated(Inventory $inventory)
    {
        //
    }

    /**
     * Handle the Inventory "deleted" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function deleted(Inventory $inventory)
    {
        //
    }

    /**
     * Handle the Inventory "restored" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function restored(Inventory $inventory)
    {
        //
    }

    /**
     * Handle the Inventory "force deleted" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function forceDeleted(Inventory $inventory)
    {
        //
    }
}
