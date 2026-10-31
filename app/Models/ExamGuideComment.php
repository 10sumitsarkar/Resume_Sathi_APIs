<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGuideComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_guide_id',
        'name',
        'email',
        'text',
        'user_ip',
        'country',
        'state',
        'city',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function examGuide()
    {
        return $this->belongsTo(ExamGuide::class);
    }
}
