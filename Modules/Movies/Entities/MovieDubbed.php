<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieDubbed extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ["language_id", "movie_id"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieDubbedFactory::new();
    }

    public static function updateDubbing($languages = [], $movie_id)
    {
        $movie_languages = [];

        MovieDubbed::whereNotIn('language_id', $languages)->where('movie_id', $movie_id)->delete();

        foreach ($languages as $item) {
            $data = ['language_id' => $item, 'movie_id' => $movie_id];
            if (!MovieDubbed::where($data)->exists()) {
                $movie_languages[] = ['language_id' => $item, 'movie_id' => $movie_id];   // add new movie if not exists in DB
            }
        }

        if (count($movie_languages)) {
            MovieDubbed::insert($movie_languages);  // create languages
        }
    }

    public function language_name()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id')->select('id', 'name');
    }
}
