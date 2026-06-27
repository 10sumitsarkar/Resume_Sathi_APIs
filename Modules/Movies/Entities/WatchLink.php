<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WatchLink extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = ["platform_id", "movie_id", "link"];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\WatchLinkFactory::new();
    }

    public function platform()
    {
        return Platform::where(['id' => $this->platform_id])->first();
    }
}
