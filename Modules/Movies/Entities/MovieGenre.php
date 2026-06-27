<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieGenre extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $table = "movie_genres";

    protected $fillable = ["genre_id", "movie_id"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieGenreFactory::new();
    }

    public static function updateGenre($genres = [], $movie_id)
    {
        $movie_genres = [];

        MovieGenre::whereNotIn('genre_id', $genres)->where('movie_id', $movie_id)->delete();

        foreach ($genres as $item) {
            $data = ['genre_id' => $item, 'movie_id' => $movie_id];
            if (!MovieGenre::where($data)->exists()) {
                $movie_genres[] = ['genre_id' => $item, 'movie_id' => $movie_id];   // add new movie if not exists in DB
            }
        }

        if (count($movie_genres)) {
            MovieGenre::insert($movie_genres);  // create genres
        }
    }


    public function genre_name()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id')->select('id', 'name');
    }
}
