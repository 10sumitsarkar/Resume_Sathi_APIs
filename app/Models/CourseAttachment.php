<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAttachment extends Model
{
    use HasFactory;

    protected $table = 'job_attachments';

    protected $fillable = [
        'course_id',
        'file',
        'file_type',
    ];

    /**
     * Get the course that owns the attachment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
