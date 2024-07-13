<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'brrow_qty',
        'status',
    ];
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
