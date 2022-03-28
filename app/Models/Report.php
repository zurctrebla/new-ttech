<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['equipment', 'model', 'abnormality', 'tag', 'created_for', 'status', 'conclusion', 'fail', 'obs', 'finished_for'];

    /**
     *  Get Created_for
     */
    public function created_for()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  Get Finished_for
     */
    public function finished_for()
    {
        return $this->belongsTo(User::class);
    }
}
