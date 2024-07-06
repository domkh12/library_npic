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
        'address',
        'gen_id',
        'dob',
        'image',
        'password',
        'status'
    ];
    public function gender()
{
    return $this->belongsTo(Gender::class, 'gen_id');
}
}
