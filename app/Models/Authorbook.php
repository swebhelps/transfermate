<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorbook extends Model
{
    use HasFactory;

    protected $table ='Author_book';

    protected $fillable = [
                            'book_id',
                            'author_id',
                          ];
}
