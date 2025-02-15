<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $table = 'biographies';

    protected $fillable = [
        'content',
    ];

    public static function first()
    {
    }

    public static function create(array $validated)
    {
    }

    public static function exists()
    {
    }
}
