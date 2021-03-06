<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->user_id = Auth()->user()->id;
        $product->uuid = Str::uuid();
        if (!$product->destiny) {
            $product->status = 'Finalizado';
        }

        $data['after'] = $product->inventory->amount;
        $product->inventory->amount--;  // atualiza estoque.

        $data['before'] = $product->inventory->amount;
        $data['user_id'] = Auth()->user()->id;

        $product->inventory->update();  // salva dados.
        $product->inventory->logs()->create($data);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleting" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleting(Product $product)
    {
        // $product->inventory->amount++;  // atualiza estoque.
        // $product->inventory->update();  // salva dados.

        $data['after'] = $product->inventory->amount;
        $product->inventory->amount++;  // atualiza estoque.

        $data['before'] = $product->inventory->amount;
        $data['user_id'] = Auth()->user()->id;

        $product->inventory->update();  // salva dados.
        $product->inventory->logs()->create($data);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
