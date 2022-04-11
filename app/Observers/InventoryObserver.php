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

        if ($inventory->export == "on") {
            $inventory->export = "Y";
        }

    }

    /**
     * Handle the Inventory "updating" event.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return void
     */
    public function updating(Inventory $inventory)
    {
        // dd($inventory->logs);
        // $inventory->logs->create();
        // $inventory->log->user_id = Auth()->user()->id;             //   usuário logado
        // $product->inventory->log->amount = $product->inventory->amount;   //  registra estoque anterior
        // $product->inventory->log->amount = $product->inventory->amount;   //  registra estoque anterior
        // $inventory->logs->create();                                  // salva log
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
