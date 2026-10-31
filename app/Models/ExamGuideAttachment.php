<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGuideAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_guide_id',
        'file',
        'file_type',
    ];

    public function examGuide()
    {
        return $this->belongsTo(ExamGuide::class);
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file ? asset($this->file) : null;
    }
}
