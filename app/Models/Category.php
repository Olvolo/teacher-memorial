<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property mixed $id
 */
class Category extends Model
{
    use HasFactory;

    // Таблица, связанная с моделью
    protected $table = 'categories';

    // Поля, которые можно массово заполнять
    protected $fillable = [
        'name', // Название категории
        'slug', // Слаг (например, для SEO-friendly URL)
        'description', // Описание категории
    ];

    // Если нужно, можно указать дату создания и обновления
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

// Генерация слага перед сохранением
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

