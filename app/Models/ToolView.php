<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolView extends Model
{
    use HasFactory;
    protected $fillable = [
        'tool_type',
    ];

    static function addView($type = 1)
    {
        ToolView::create(['tool_type' => $type]);
    }

    static function todayViews()
    {
        return ToolView::whereDate('created_at', Carbon::today())->count();
    }


    static function totalViews($type=null)
    {
        if ($type) {
            return ToolView::where('tool_type', $type)->count();
        }
        return ToolView::count();
    }
}
