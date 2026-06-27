<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snipit extends Model
{
    use HasFactory;

    protected $table = 'snipits';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'programming_language_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'is_active',
        'created_by',
        'snipit_category',
        'url_name',
        'canonical_tag',
        'hero_image',
        'pageview',
        'is_draft',
    ];

    /**
     * Get the category that owns the snipit.
     */
    public function category()
    {
        return $this->belongsTo(SnipitCategory::class, 'category_id');
    }

    /**
     * Get the programming language that owns the snipit.
     */
    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'programming_language_id');
    }

    /**
     * Get the attachments for the snipit.
     */
    public function attachments()
    {
        return $this->hasMany(SnipitAttachment::class);
    }

    /**
     * Get the codes for the snipit.
     */
    public function codes()
    {
        return $this->hasOne(SnipitCode::class);
    }

    /**
     * Get the user who created the snipit.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the snipit type.
     */
    public function snipit_type()
    {
        return $this->belongsTo(SnipitCategory::class, 'snipit_category');
    }

    static function popular($limit = 10)
    {
        $popular_artcles = Snipit::where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->orderBy('pageview', 'desc')->limit($limit)->get();
        return $popular_artcles;
    }

    function addView()
    {
        $this->pageview = intval($this->pageview) + 1;
        $this->save();
        $data = ['post_id' => $this->id, 'post_category' => 3, 'created_at' => Carbon::now()];
        $check = PageView::where($data)->first();
        if (!$check) {
            PageView::create($data);
        }
        return $this->pageview;
    }

    static function random_snipit($limit = 10)
    {
        $related_artcles = Snipit::select('id', 'title', 'canonical_tag')
            ->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->orderBy('created_at', 'desc')->get()->random($limit);
        return $related_artcles;
    }

    static function getCarousel($limit = 5)
    {
        $related_artcles = Snipit::select('id', 'title', 'canonical_tag', 'hero_image')
            ->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->where('hero_image', '!=', null)
            ->orderBy('created_at', 'desc')
            ->limit($limit)->get();
        return $related_artcles;
    }

    static function todayViews()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 3)->count();
    }

    static function totalViews()
    {
        return PageView::where('post_category', 3)->count();
    }

    static function activePost()
    {
        return Snipit::where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->get();
    }

    static function getTodayPostClicks()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 3)->get()->unique('post_id');
    }
}
