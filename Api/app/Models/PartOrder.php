<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartOrder extends Model
{
    protected $fillable = [
        'maintenanceId',
        'partId',


    ];
}
