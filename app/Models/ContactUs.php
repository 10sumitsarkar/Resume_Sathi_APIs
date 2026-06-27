<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'phone',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function fullName(){
        return $this->first_name .' '. $this->last_name;
    }
}
