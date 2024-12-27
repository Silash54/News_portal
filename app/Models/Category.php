<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'position',
        'english_title',
        'nepali_title',
        'slug'
    ];
    public function Posts()
    {
        return  $this->belongsToMany(Post::class);
    }
}
