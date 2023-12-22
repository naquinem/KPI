<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;

    protected $table = 'crud';

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'age',
        'birth_date',
        'address',
    ];
}
