<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'title',
        'author',
        'category',
        'year',
        'image',
        'description',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }
}
