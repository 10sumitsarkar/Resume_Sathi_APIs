<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'programing_languages';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
    ];

    /**
     * Get the snipits for the programming language.
     */
    public function snipits()
    {
        return $this->hasMany(Snipit::class, 'programming_language_id');
    }
} 