<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $table ='Book';

    protected $fillable = [
                            'book_id',
                            'book_name',
                            'author_id',
                          ];

}
