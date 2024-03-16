<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'categories_id',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
