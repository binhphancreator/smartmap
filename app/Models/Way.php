<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function startPoint()
    {
        return $this->belongsTo('App\Models\Point');
    }

    public function endPoint()
    {
        return $this->belongsTo('App\Models\Point');
    }

}
