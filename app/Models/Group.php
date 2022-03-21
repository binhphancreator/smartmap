<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'name'
    ];

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
