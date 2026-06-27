<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnipitAttachment extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'file_type', 'snipit_id'];

}
