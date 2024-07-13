<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrowing';
    protected $fillable = [
        'id',
        'borrow_date',
        'return_date',
        'deadline_date',
        'bd_id',
        
    ];
}
