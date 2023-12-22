<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headcount extends Model
{
    use HasFactory;
    protected $table = 'headcounts';
    protected $fillable = [
        'total_headcounts',
    ];
}
