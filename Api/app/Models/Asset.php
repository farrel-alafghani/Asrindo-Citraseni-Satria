<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'assetName',
        'serialNumber',
        'isActive',
        'lastMaintenance',

    ];
}
