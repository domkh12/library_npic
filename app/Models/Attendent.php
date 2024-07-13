<?php

namespace App\Models;
use App\Models\attendent\Attend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendent extends Model
{
    use HasFactory;
    protected $table ='attendents';
    protected $fillable =[
        
        'name',
        'gender',
        'time_in',
        'time_out',
        'date',
        'status',
    ];

}
