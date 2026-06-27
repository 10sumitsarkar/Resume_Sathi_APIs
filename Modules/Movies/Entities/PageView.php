<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageView extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ['movie_id', 'location', 'category_id'];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\PageViewFactory::new();
    }
}
