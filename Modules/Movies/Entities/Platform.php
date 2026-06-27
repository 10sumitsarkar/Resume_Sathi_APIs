<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\PlatformFactory::new();
    }
}
