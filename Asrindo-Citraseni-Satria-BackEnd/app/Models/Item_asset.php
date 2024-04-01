<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_asset extends Model
{
    protected $fillable = [
        'itemName',
        'serialNumber',
    ];
}
