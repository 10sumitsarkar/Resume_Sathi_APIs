<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGuideContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_guide_id',
        'content',
        'order',
    ];

    public function examGuide()
    {
        return $this->belongsTo(ExamGuide::class);
    }
}
