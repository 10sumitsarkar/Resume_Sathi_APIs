<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Course extends Model
{
    use HasFactory;

    protected $table = 'jobs';

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
        'company',
        'location',
        'employment_type',
        'salary',
        'job_type_id',
        'department_id',
        'featured',
        'trending',
        'urgent',
        'homepage',
        'application_begin',
        'last_date_for_apply',
        'has_admit_card',
        'has_answer_key',
        'has_result',
    ];

    protected $casts = [
        'has_admit_card' => 'boolean',
        'has_answer_key' => 'boolean',
        'has_result' => 'boolean',
    ];
    // protected $dates = ['deleted_at'];

    /**
     * Get the category that owns the job.
     */
    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_type');
    }

    /**
     * Alias for the category relationship used by the admin views.
     */
    public function category()
    {
        return $this->course_category();
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

    static function related($type = null, $excludeId = null)
    {
        $query = Course::select(['canonical_tag', 'title', 'topic_name'])
            ->where(['is_active' => 1, 'status' => 1]);

        if ($type !== null) {
            if (Schema::hasColumn('jobs', 'job_type_id')) {
                $query->where('job_type_id', $type);
            } elseif (Schema::hasColumn('jobs', 'department_id')) {
                $query->where('department_id', $type);
            } elseif (Schema::hasColumn('jobs', 'course_type')) {
                $query->where('course_type', $type);
            }
        }

        if ($excludeId !== null) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->limit(10)->get();
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
        return Course::where(['is_active' => 1, 'status' => 1])->get();
    }

    static function getTodayPostClicks()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 2)->get()->unique('post_id');
    }
}
