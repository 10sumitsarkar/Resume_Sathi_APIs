<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnipitCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the snipits for the category.
     */
    public function snipits()
    {
        return $this->hasMany(Snipit::class, 'category_id');
    }
}
