<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

protected $fillable = [
    'first_name',
    'last_name',
    'phone_number',
    'email',
    'message',
];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function fullName(){
        return $this->first_name .' '. $this->last_name;
    }
}
