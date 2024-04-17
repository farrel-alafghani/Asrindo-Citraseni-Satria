<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'unitId',
        'assetId',
        'itemId',
        'userId',
        'teamId',
        'taskId',
        'maintenanceType',
        'category',
        'maintenanceAt'
    ];
}
