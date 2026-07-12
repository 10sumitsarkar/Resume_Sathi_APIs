<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'job_categories';

    protected $fillable = [
        'course_name',
        'course_url',
        'course_image',
        'description',
        'created_by',
        'is_active',
    ];

    /**
     * The user who created the category.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the courses for the category.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
