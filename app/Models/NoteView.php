<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteView extends Model
{
    use HasFactory;

    protected $fillable = ['note_type', 'created_at'];

    static function addView($type = 1)
    {
        NoteView::create(['note_type' => $type]);
    }

    static function todayViews()
    {
        return NoteView::whereDate('created_at', Carbon::today())->count();
    }

    static function totalViews()
    {
        return NoteView::count();
    }
}
