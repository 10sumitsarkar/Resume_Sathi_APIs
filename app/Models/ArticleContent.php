<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'content',
        'order',
    ];

    /**
     * Get the article that owns the content.
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
