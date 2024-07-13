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
        'faculty',
        'time_in',
        'time_out',
        'date',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

}
