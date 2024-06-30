<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendent extends Model
{
    use HasFactory;
    protected $table = '    ';
    protected $fillable = [
        'name',
        'stu_id',
        'time_out',
        'date',
        'status',
    ];

}
