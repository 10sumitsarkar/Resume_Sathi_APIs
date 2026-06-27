<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'status',
        'price',
        'duration',
        'level',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'is_active',
        'created_by',
        'topic_name',
        'url_name',
        'canonical_tag',
        'course_type',
        'language_id',
        'hero_image',
        'pageview',
        'is_draft',
    ];
    // protected $dates = ['deleted_at'];

    /**
     * Get the category that owns the course.
     */
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    /**
     * Get the content for the course.
     */
    public function content()
    {
        return $this->hasOne(CourseContent::class, 'course_id');
    }

    /**
     * Get the attachments for the course.
     */
    public function attachments()
    {
        return $this->hasMany(CourseAttachment::class);
    }

    /**
     * Get the contents for the course.
     */
    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    /**
     * Get the user who created the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    static function related($type)
    {
        $related_artcles = Course::select('canonical_tag', 'topic_name')->where(['course_type' => $type, 'is_active' => 1, 'status' => 1, 'is_draft' => 0])->get();
        return $related_artcles;
    }

    function addView()
    {
        $this->pageview = intval($this->pageview) + 1;
        $this->save();
        $data = ['post_id' => $this->id, 'post_category' => 2, 'created_at' => Carbon::now()];
        $check = PageView::where($data)->first();
        if (!$check) {
            PageView::create($data);
        }
        return $this->pageview;
    }

    static function todayViews()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 2)->count();
    }

    static function totalViews()
    {
        return PageView::where('post_category', 2)->count();
    }

    static function activePost()
    {
        return Course::where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->get();
    }

    static function getTodayPostClicks()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 2)->get()->unique('post_id');
    }
}
