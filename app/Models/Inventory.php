<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'equipment', 'brand', 'model', 'condition', 'amount', 'status'];

    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Logs
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
