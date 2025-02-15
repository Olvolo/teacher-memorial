<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    public mixed $id;
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'slug',
        'description'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public static function count()
    {
    }

    public static function create(array $validated)
    {
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

