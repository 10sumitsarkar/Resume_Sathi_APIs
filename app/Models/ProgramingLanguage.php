<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramingLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'url_name',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
