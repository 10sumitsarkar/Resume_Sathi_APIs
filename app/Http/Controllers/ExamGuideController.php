<?php

namespace App\Http\Controllers;

use App\Models\ExamGuide;
use App\Models\ExamGuideComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExamGuideController extends Controller
{
    public function index()
    {
        $guides = ExamGuide::query()
            ->where('status', true)
            ->latest('id')
            ->get();

        return view('backend.pages.exam-guides.index', [
            'guides' => $guides,
            'isDraftListing' => false,
        ]);
    }

    public function drafts()
    {
        $guides = ExamGuide::query()
            ->where('status', true)
            ->where('is_active', false)
            ->latest('updated_at')
            ->get();

        return view('backend.pages.exam-guides.index', [
            'guides' => $guides,
            'isDraftListing' => true,
        ]);
    }

    public function comments()
    {
        $comments = ExamGuideComment::with('examGuide')->latest('id')
            ->get();

        return view('backend.pages.exam-guides.comments', compact('comments'));
    }

    public function destroyComment(ExamGuideComment $examGuideComment)
    {
        $examGuideComment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function create()
    {
        $guide = ExamGuide::where('status', false)
            ->where('created_by', Auth::id())
            ->where('slug', 'like', 'new-exam-guide-%')
            ->latest('id')
            ->first();

        if (!$guide) {
            $guide = ExamGuide::create([
                'title' => '',
                'slug' => 'new-exam-guide-' . Str::uuid(),
                'status' => false,
                'is_active' => false,
                'created_by' => Auth::id(),
            ]);
        }

        return redirect()->route('exam-guides.edit', $guide);
    }

    public function store(Request $request)
    {
        $validated = $this->validatedGuide($request);
        $guide = DB::transaction(function () use ($request, $validated) {
            $guide = new ExamGuide();
            $this->saveGuide($guide, $request, $validated);

            return $guide;
        });

        return redirect()->route('exam-guides.edit', $guide)->with('success', 'Exam guide saved successfully.');
    }

    public function edit(ExamGuide $examGuide)
    {
        $examGuide->load('content', 'attachments');

        return $this->form($examGuide);
    }

    private function form(ExamGuide $guide)
    {
        return view('backend.pages.exam-guides.form', [
            'guide' => $guide,
        ]);
    }

    public function update(Request $request, ExamGuide $examGuide)
    {
        $validated = $this->validatedGuide($request, $examGuide);
        $previousImage = $examGuide->hero_image;
        DB::transaction(function () use ($request, $validated, $examGuide) {
            $this->saveGuide($examGuide, $request, $validated);
        });
        if ($previousImage && $previousImage !== $examGuide->hero_image) {
            $this->deletePublicFile($previousImage);
        }

        return redirect()->route('exam-guides.edit', $examGuide)->with('success', 'Exam guide updated successfully.');
    }

    public function destroy(ExamGuide $examGuide)
    {
        $image = $examGuide->hero_image;
        $attachments = $examGuide->attachments()->get();
        foreach ($attachments as $attachment) {
            $this->deletePublicFile($attachment->file);
        }
        $examGuide->delete();
        $this->deletePublicFile($image);

        return redirect()->route('exam-guides.index')->with('success', 'Exam guide deleted successfully.');
    }

    public function toggleStatus(ExamGuide $examGuide)
    {
        $examGuide->is_active = !$examGuide->is_active;
        $examGuide->status = true;
        $examGuide->save();

        return redirect()->back()->with('success', 'Exam guide status updated.');
    }

    private function validatedGuide(Request $request, ?ExamGuide $guide = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:5000'],
            'meta_keyword' => ['nullable', 'string', 'max:5000'],
            'application_begin' => ['nullable', 'date'],
            'last_date_for_apply' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);
        $slug = Str::slug($validated['slug'] ?: $validated['title']) ?: 'exam-guide';
        if ($guide && $slug === $guide->slug) {
            $validated['slug'] = $slug;
            return $validated;
        }
        $validated['slug'] = $slug;
        Validator::make($validated, [
            'slug' => ['required', Rule::unique('exam_guides', 'slug')->ignore($guide?->id)],
        ])->validate();

        return $validated;
    }

    private function saveGuide(ExamGuide $guide, Request $request, array $validated): void
    {
        $slug = $validated['slug'];

        $guide->fill([
            'title' => $validated['title'],
            'slug' => $slug,
            'meta_title' => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keyword' => $validated['meta_keyword'] ?? null,
            'canonical_tag' => 'exam-guides/' . $slug,
            'is_active' => $request->boolean('is_active'),
            'status' => true,
            'created_by' => $guide->created_by ?: Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $directory = public_path('exam_guides');
            if (!File::exists($directory) && !File::makeDirectory($directory, 0755, true)) {
                throw new \RuntimeException('Unable to create the Exam Guide image directory.');
            }
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move($directory, $filename);
            $guide->hero_image = 'exam_guides/' . $filename;
        }

        $guide->save();
        $guide->contents()->updateOrCreate(
            ['order' => 0],
            ['content' => $validated['content'] ?? '']
        );
    }

    private function deletePublicFile(?string $path): void
    {
        if (!$path) {
            return;
        }

        $relativePath = ltrim(parse_url($path, PHP_URL_PATH) ?: $path, '/');
        $relativePath = preg_replace('#^(public/|storage/)#', '', $relativePath);
        $fullPath = public_path($relativePath);

        if (File::exists($fullPath) && File::isFile($fullPath)) {
            File::delete($fullPath);
        }
    }
}
