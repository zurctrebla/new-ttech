<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Str;

class GameObserver
{
    /**
     * Handle the Game "creating" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function creating(Game $game)
    {
        $game->uuid = Str::uuid();
    }

    /**
     * Handle the Game "updated" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function updated(Game $game)
    {
        //
    }

    /**
     * Handle the Game "deleted" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function deleted(Game $game)
    {
        //
    }

    /**
     * Handle the Game "restored" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function restored(Game $game)
    {
        //
    }

    /**
     * Handle the Game "force deleted" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function forceDeleted(Game $game)
    {
        //
    }
}
