<?php

namespace Modules\Movies\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $table = "movies";

    protected $fillable = [
        "name",
        "description",
        "label",
        "url_name",
        "meta_title",
        "meta_description",
        "meta_keyword",
        "canonical_tag",
        "poster_image",
        "hero_image",
        "casts",
        "director",
        "duration",
        "release_date",
        "seasion",
        "audience_type",
        "writer",
        "cinematography",
        "music",
        "producer",
        "production",
        "certificate",
        "is_draft",
        "is_active",
        "pageview",
        "status",
        "created_by"
    ];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieFactory::new();
    }


    public function content()
    {
        return $this->belongsTo(MovieContent::class, 'id', 'movie_id');
    }


    public function watchlink()
    {
        return $this->belongsTo(WatchLink::class, 'id', 'movie_id');
    }

    public function booklink()
    {
        return $this->belongsTo(BookLink::class, 'id', 'movie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function languages()
    {
        return $this->hasMany(MovieLanguage::class, 'movie_id', 'id');
    }

    public function language_ids()
    {
        return MovieLanguage::where('movie_id', $this->id)->pluck('language_id')->toArray();
    }

    public function language_text()
    {
        $list = MovieLanguage::with('language_name')->where('movie_id', $this->id)->get()->map(function ($item) {
            return $item->language_name ? $item->language_name->name : null;
        })->toArray();

        return implode(', ', $list);
    }

    public function dub_language_ids()
    {
        return MovieDubbed::where('movie_id', $this->id)->pluck('language_id')->toArray();
    }

    public function dub_language_text()
    {
        $list = MovieDubbed::with('language_name')->where('movie_id', $this->id)->get()->map(function ($item) {
            return $item->language_name ? $item->language_name->name : null;
        })->toArray();

        return implode(', ', $list);
    }

    public function genre_ids()
    {
        return MovieGenre::where('movie_id', $this->id)->pluck('genre_id')->toArray();
    }

    public function genre_text()
    {
        $list = MovieGenre::with('genre_name')->where('movie_id', $this->id)->get()->map(function ($item) {
            return $item->genre_name ? $item->genre_name->name : null;
        })->toArray();

        return implode(', ', $list);
    }


    public function movie_category()
    {
        return $this->belongsTo(MovieCategory::class, 'movie_type', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(MovieAttachment::class, 'movie_id', 'id');
    }

    public function is_upcoming()
    {
        return Carbon::parse($this->release_date) > today();
    }

    public function is_latest()
    {
        return Carbon::parse($this->release_date) < today() && Carbon::parse($this->release_date)->addMonth(1) > today();
    }

    function addView()
    {
        $this->pageview = intval($this->pageview) + 1;
        $this->save();
        $data = ['movie_id' => $this->id, 'category' => $this->category_id, 'created_at' => Carbon::now()];
        $check = PageView::where($data)->first();
        if (!$check) {
            PageView::create($data);
        }
        return $this->pageview;
    }
}
