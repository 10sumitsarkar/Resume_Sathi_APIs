<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieContent extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $table = "movie_contents";

    protected $fillable = ["content", "movie_id"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieContentFactory::new();
    }
}
