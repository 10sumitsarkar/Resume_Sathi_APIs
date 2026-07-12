<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'file',
        'file_type',
    ];

    /**
     * Get the article that owns the attachment.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getFileUrlAttribute(): ?string
    {
        if (empty($this->file)) {
            return null;
        }

        return asset($this->file);
    }
}
