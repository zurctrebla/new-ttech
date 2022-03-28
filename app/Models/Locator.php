<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locator extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'partner_id', 'game_id', 'client_id', 'device_id', 'locator', 'serial'];

    /**
     * Get Game
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get Client
     */
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Partner
     */
    public function partner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Device
     */
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

}
