<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleComment;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Subscriber;
use App\Services\PublicContentCacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PublicContentController extends Controller
{
    public function articles(Request $request)
    {
        $limit = max(1, min((int) $request->query('limit', 10), 500));
        $relations = ['user', 'category'];
        if ($request->boolean('include_contents')) {
            $relations[] = 'contents';
        }

        $query = Article::with($relations)
            ->where(['is_draft' => 0, 'status' => 1, 'is_active' => 1])
            ->orderBy('created_at', 'desc');

        if ($request->filled('category_id')) {
            $query->where('article_type', $request->query('category_id'));
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('article_title', 'like', "%{$search}%")
                    ->orWhere('meta_title', 'like', "%{$search}%")
                    ->orWhere('meta_description', 'like', "%{$search}%")
                    ->orWhere('url_name', 'like', "%{$search}%");
            });
        }

        $page = $query->paginate($limit);

        return response()->json([
            'items' => $page->items(),
            'total' => $page->total(),
            'page' => $page->currentPage(),
            'per_page' => $page->perPage(),
        ]);
    }

    public function latestArticles(Request $request)
    {
        $limit = max(1, min((int) $request->query('limit', 5), 20));

        return Article::with(['user', 'category'])
            ->where(['is_draft' => 0, 'status' => 1, 'is_active' => 1])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function articleBySlug($slug)
    {
        $decodedSlug = urldecode($slug);

        $article = Article::with(['user', 'category', 'contents'])
            ->where(['is_draft' => 0, 'status' => 1, 'is_active' => 1])
            ->where(function ($query) use ($decodedSlug) {
                $query->where('url_name', $decodedSlug)
                    ->orWhere('canonical_tag', $decodedSlug)
                    ->orWhere('canonical_tag', 'like', "%/{$decodedSlug}");
            })
            ->first();

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        return $article;
    }

    public function articleCategories()
    {
        return ArticleCategory::orderBy('id')->get();
    }

    public function articleComments(Request $request)
    {
        $request->validate(['article_id' => 'required|integer']);

        return response()->json([
            'comments' => ArticleComment::where('article_id', $request->query('article_id'))
                ->where(function ($query) {
                    $query->where('is_public', 1)->orWhereNull('is_public');
                })
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }

    public function storeArticleComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'article_id' => 'required|integer|exists:articles,id',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'text' => 'required|string|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid comment data', 'errors' => $validator->errors()], 422);
        }

        $comment = ArticleComment::create([
            'article_id' => $request->article_id,
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'user_ip' => $request->ip(),
            'is_public' => 1,
        ]);

        return response()->json(['message' => 'Comment submitted successfully', 'comment' => $comment], 201);
    }

    public function courses(Request $request)
    {
        $limit = max(1, min((int) $request->query('limit', 12), 500));
        $relations = ['user', 'course_category'];
        if ($request->boolean('include_contents')) {
            $relations[] = 'contents';
        }

        $query = Course::with($relations)
            ->where('status', 1)
            ->where(function ($q) {
                $q->where('is_active', 1)->orWhereNull('is_active');
            })
            ->orderBy('created_at', 'desc');

        if ($request->filled('category_id')) {
            $query->where('course_type', $request->query('category_id'));
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('topic_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $page = $query->paginate($limit);

        return response()->json([
            'items' => $page->items(),
            'total' => $page->total(),
            'page' => $page->currentPage(),
            'per_page' => $page->perPage(),
        ]);
    }

    public function latestCourses(Request $request)
    {
        $limit = max(1, min((int) $request->query('limit', 5), 20));

        return Course::with(['user', 'course_category'])
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('is_active', 1)->orWhereNull('is_active');
            })
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function courseBySlug($slug)
    {
        $decodedSlug = urldecode($slug);

        $course = Course::with(['user', 'course_category', 'contents'])
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('is_active', 1)->orWhereNull('is_active');
            })
            ->where(function ($query) use ($decodedSlug) {
                $query->where('slug', $decodedSlug)
                    ->orWhere('url_name', $decodedSlug)
                    ->orWhere('canonical_tag', $decodedSlug)
                    ->orWhere('canonical_tag', 'like', "%/{$decodedSlug}");
            })
            ->first();

        if (!$course) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        return $course;
    }

    public function courseCategories()
    {
        return CourseCategory::orderBy('id')->get();
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        $nameParts = preg_split('/\s+/', trim($validated['name']), 2);
        $contact = ContactUs::create([
            'first_name' => $nameParts[0] ?? '',
            'last_name' => $nameParts[1] ?? '',
            'email' => $validated['email'],
            'phone_number' => $validated['phone'] ?? null,
            'message' => $validated['message'],
        ]);

        return response()->json([
            'message' => 'Contact form submitted successfully',
            'data' => $contact,
        ], 201);
    }

    public function storeSubscriber(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email',
            'name' => 'nullable|string|max:255',
        ]);

        $subscriber = Subscriber::create([
            'email' => $validated['email'],
            'name' => $validated['name'] ?? null,
            'status' => true,
        ]);

        return response()->json([
            'message' => 'Successfully subscribed to newsletter',
            'data' => $subscriber,
        ], 201);
    }

    public function rebuildCache(PublicContentCacheService $cache)
    {
        return response()->json([
            'message' => 'Public content cache rebuilt successfully',
            'counts' => $cache->rebuild(),
        ]);
    }

    public function cacheFile($filename)
    {
        $allowed = [
            'articles.json',
            'jobs.json',
            'article-categories.json',
            'job-categories.json',
            'manifest.json',
        ];

        if (!in_array($filename, $allowed, true)) {
            abort(404);
        }

        $path = public_path(PublicContentCacheService::DIRECTORY . DIRECTORY_SEPARATOR . $filename);
        if (!File::exists($path)) {
            app(PublicContentCacheService::class)->rebuild();
        }

        return response(File::get($path), 200, [
            'Content-Type' => 'application/json; charset=utf-8',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
