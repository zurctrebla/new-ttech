<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'inventory_id', 'serial', 'tag', 'model', 'destiny', 'status'];

    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Inventory
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
