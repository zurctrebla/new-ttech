<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'inventory_id', 'after', 'before'];

    /**
     * Get Inventory
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
