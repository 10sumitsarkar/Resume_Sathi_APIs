<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "parent",
        "text",
        "article_id",
        "user_ip",
        "is_public",
        "country",
        "state",
        "city",
        "created_at",
        "updated_at"
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }
}
