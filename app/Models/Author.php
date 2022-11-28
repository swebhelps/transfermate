<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table ='Author';

    protected $fillable = [
                            'author_id',
                            'author_name',
                        ];



}
