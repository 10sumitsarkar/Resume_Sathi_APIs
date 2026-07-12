<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'status',
        'article_title',
        'url_name',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'canonical_tag',
        'article_type',
        'language_id',
        'hero_image',
        'pageview',
        'is_draft',
        'is_active',
        'created_by',
    ];
    // protected $dates = ['deleted_at'];

    /**
     * Get the category that owns the article.
     */
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_type');
    }

    /**
     * Get the content for the article.
     */
    public function content()
    {
        return $this->hasOne(ArticleContent::class, 'article_id');
    }

    /**
     * Get the contents for the article.
     */
    public function contents()
    {
        return $this->hasMany(ArticleContent::class);
    }

    /**
     * Get the comments for the article.
     */
    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    /**
     * Get the attachments for the article.
     */
    public function attachments()
    {
        return $this->hasMany(ArticleAttachment::class);
    }

    /**
     * Get the user who created the article.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\ProgramingLanguage', 'language_id', 'id');
    }

    public function article_category()
    {
        return $this->belongsTo('App\Models\ArticleCategory', 'article_type', 'id');
    }

    static function related($type, $id, $limit = 10)
    {
        $related_artcles = Article::select('canonical_tag', 'article_title')->where(['article_type' => $type, 'is_active' => 1, 'status' => 1, 'is_draft' => 0])->where('id', '!=', $id)->limit($limit)->get();
        return $related_artcles;
    }

    static function latest($id = false, $limit = 10)
    {
        $related_artcles = Article::with('language')->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->where(function ($query) use ($id) {
                if ($id) {
                    $query->where('id', '!=', $id);
                }
            })
            ->orderBy('created_at', 'desc')->limit($limit)->get();
        return $related_artcles;
    }

    static function random_post($id = false, $limit = 10)
    {
        $related_artcles = Article::with('language')->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->where(function ($query) use ($id) {
                if ($id) {
                    $query->where('id', '!=', $id);
                }
            })
            ->orderBy('created_at', 'desc')->get()->random($limit);
        return $related_artcles;
    }

    static function popular($limit = 10)
    {
        $popular_artcles = Article::where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->orderBy('pageview', 'desc')->limit($limit)->get();
        return $popular_artcles;
    }

    static function blogs($limit = 10)
    {
        $popular_artcles = Article::with('user')->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->whereIn('article_type', [2, 3])->orderBy('pageview', 'desc')->get()->random($limit);
        return $popular_artcles;
    }

    function addView()
    {
        $this->pageview = intval($this->pageview) + 1;
        $this->save();
        $data = ['post_id' => $this->id, 'post_category' => 1, 'created_at' => Carbon::now()];
        $check = PageView::where($data)->first();
        if (!$check) {
            PageView::create($data);
        }
        return $this->pageview;
    }

    static function todayViews()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 1)->count();
    }

    static function totalViews()
    {
        return PageView::where('post_category', 1)->count();
    }

    static function activePost()
    {
        return Article::where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])->get();
    }

    static function getTodayPostClicks()
    {
        return PageView::whereDate('created_at', Carbon::today())->where('post_category', 1)->get()->unique('post_id');
    }
}
