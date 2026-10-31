<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'canonical_tag',
        'hero_image',
        'application_begin',
        'last_date_for_apply',
        'has_admit_card',
        'has_answer_key',
        'has_result',
        'pageview',
        'status',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'application_begin' => 'date:Y-m-d',
        'last_date_for_apply' => 'date:Y-m-d',
        'has_admit_card' => 'boolean',
        'has_answer_key' => 'boolean',
        'has_result' => 'boolean',
        'status' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $appends = ['url_name', 'topic_name'];

    public function getUrlNameAttribute(): string
    {
        return $this->slug;
    }

    public function getTopicNameAttribute(): string
    {
        return $this->title;
    }

    public function contents()
    {
        return $this->hasMany(ExamGuideContent::class)->orderBy('order');
    }

    public function content()
    {
        return $this->hasOne(ExamGuideContent::class)->orderBy('order');
    }

    public function attachments()
    {
        return $this->hasMany(ExamGuideAttachment::class);
    }

    public function comments()
    {
        return $this->hasMany(ExamGuideComment::class);
    }

    public function getHeroImageUrlAttribute(): ?string
    {
        return $this->hero_image ? asset($this->hero_image) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
