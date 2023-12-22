<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $table = 'planning_requests';
    protected $fillable = [
        'workweek',
        'planning_monday',
        'planning_tuesday',
        'planning_wednesday',
        'planning_thursday',
        'planning_friday',
        'planning_saturday',
        'planning_sunday',
        'output_monday',
        'output_tuesday',
        'output_wednesday',
        'output_thursday',
        'output_friday',
        'output_saturday',
        'output_sunday',
    ];
}
