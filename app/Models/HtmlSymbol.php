<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlSymbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'category_id',
        'description',
        'example',
        'is_active',
    ];

    /**
     * Get the category that owns the symbol.
     */
    public function category()
    {
        return $this->belongsTo(HtmlSymbolCategory::class, 'category_id');
    }
}




