<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ["name", "is_active"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\LanguageFactory::new();
    }
}
