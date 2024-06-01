<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id', 'title', 'slug', 'description', 'img', 'views', 'status', 'publish_date'
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
