<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieLanguage extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ["language_id", "movie_id"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieLanguageFactory::new();
    }


    public static function updateLanguage($languages = [], $movie_id)
    {
        $movie_languages = [];

        MovieLanguage::whereNotIn('language_id', $languages)->where('movie_id', $movie_id)->delete();

        foreach ($languages as $item) {
            $data = ['language_id' => $item, 'movie_id' => $movie_id];
            if (!MovieLanguage::where($data)->exists()) {
                $movie_languages[] = ['language_id' => $item, 'movie_id' => $movie_id];   // add new movie if not exists in DB
            }
        }

        if (count($movie_languages)) {
            MovieLanguage::insert($movie_languages);  // create languages
        }
    }


    public function language_name()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id')->select('id', 'name');
    }
}
