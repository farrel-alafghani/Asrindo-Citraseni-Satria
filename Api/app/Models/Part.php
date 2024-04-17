<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'partName',
        'price',
        'qty',
        'detail',

    ];

    public function partOrder()
    {
        return $this->hasMany(Part::class, 'part_id', 'id');
    }
}
