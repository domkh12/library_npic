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
        'photo',
        'edition',
        'isbn',
        'author',
        'subject_name',
        'book_quantity',
        'price',
        'description',
        'category_name',
        'publisher',
    
        
    ];


}
