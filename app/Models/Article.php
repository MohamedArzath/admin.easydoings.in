<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    use HasFactory;

    protected $connection = 'easydoings';
    protected $table = 'myblogs';

    protected $fillable = ['title', 'slug', 'description','content','category_id', 'author_id', 'image_1', 'image_2', 'image_alt_text','status','published_at', 'meta_title', 'meta_description', 'likes', 'views', 'comments_enabled', 'featured']; // Allow mass assignment
}
