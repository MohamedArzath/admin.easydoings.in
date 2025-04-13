<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = ['name', 'sector_id', 'category_status','cat_priority'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
     
    // protected $table = 'categories';

    // protected $fillable = ['name', 'slug', 'description']; // Allow mass assignment
}