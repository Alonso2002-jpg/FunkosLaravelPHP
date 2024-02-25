<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funko extends Model
{
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'img',
        'category_id',
        'isDeleted'
    ];
    public function scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(name) LIKE ?', ["%" . strtolower($search) . "%"]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
