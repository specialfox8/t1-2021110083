<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'image', 'body', 'published_at', 'views'];

    protected $append = ['image_url'];
}
