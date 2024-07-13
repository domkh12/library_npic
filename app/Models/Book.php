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
        'category_name',
        'book_quantity',
        'price',
        'description',
        
        
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

}
