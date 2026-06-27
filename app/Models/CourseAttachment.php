<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'is_active',
    ];

    /**
     * Get the course that owns the attachment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
