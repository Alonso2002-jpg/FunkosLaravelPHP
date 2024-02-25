<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nameCategory', 'isDeleted'];


    public function scopeByName($query, $search){
        return $query->whereRaw('LOWER(nameCategory) LIKE ?', ["%" . strtolower($search) . "%"]);
    }

    public function scopeByState($query){
        return $query->where('is_deleted', 1);
    }

    public function funkos()
    {
        return $this->hasMany(Funko::class);
    }
    use HasFactory;
}

