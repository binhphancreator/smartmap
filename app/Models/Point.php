<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function ways()
    {
        return $this->hasMany('App\Models\ways');
    }
}
