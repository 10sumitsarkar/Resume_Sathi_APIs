<?php

namespace Modules\Movies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieAttachment extends Model
{
    use HasFactory;

    protected $connection = "movies";

    protected $table = "movie_attachments";

    protected $fillable = ['file', 'file_type', 'movie_id'];

    protected static function newFactory()
    {
        return \Modules\Movies\Database\factories\MovieAttachmentFactory::new();
    }
}
