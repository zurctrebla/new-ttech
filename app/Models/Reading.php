<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reading extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['locator_id', 'input', 'output'];

    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Locator
     */
    public function locator()
    {
        return $this->belongsTo(Locator::class);
    }
}
