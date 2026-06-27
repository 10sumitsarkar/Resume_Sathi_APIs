<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookLink extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ["platform_id", "movie_id", "link"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\BookLinkFactory::new();
    }

    public function platform()
    {
        return Platform::where(['id' => $this->platform_id])->first();
    }
}
