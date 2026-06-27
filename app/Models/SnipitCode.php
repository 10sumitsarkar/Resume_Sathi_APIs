<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnipitCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'snipit_id',
        'html',
        'css',
        'javascript',
    ];

}
