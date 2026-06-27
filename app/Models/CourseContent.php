<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'content',
        'order',
        'is_active',
    ];

    /**
     * Get the course that owns the content.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
