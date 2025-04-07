<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Article extends Model
{
    protected $fillable = ['title', 'text', 'photo', 'likes', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
