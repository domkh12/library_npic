<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $fillable = [
        'name',
        'book_author',
        'book_publisher',
        'book_isbn',
        'book_price',
        'book_quantity',
        'description',
    ];

}
