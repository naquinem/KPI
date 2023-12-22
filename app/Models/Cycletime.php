<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycletime extends Model
{
    use HasFactory;

    protected $table = 'cycletimes';
    protected $fillable = [
        'workweek',
        'cycletime_monday',
        'cycletime_tuesday',
        'cycletime_wednesday',
        'cycletime_thursday',
        'cycletime_friday',
        'cycletime_saturday',
        'cycletime_sunday',
    ];
}
