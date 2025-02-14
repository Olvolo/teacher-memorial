<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property mixed $id
 * @method static create(array $all)
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', // Название категории
        'slug', // Слаг (например, для SEO-friendly URL)
        'description', // Описание категории
    ];

     const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}

