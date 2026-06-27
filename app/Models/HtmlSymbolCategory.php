<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlSymbolCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    /**
     * Get the symbols for the category.
     */
    public function symbols()
    {
        return $this->hasMany(HtmlSymbol::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function hasEntities(){
       $data = HtmlSymbol::where(['is_active'=>1, 'category_id'=>$this->id])->count();
       return $data ? true : false;
    }

    public function entities($limit=false){
        if($limit){
            $data = HtmlSymbol::where(['is_active'=>1, 'category_id'=>$this->id])->limit($limit)->get();
        }else{
            $data = HtmlSymbol::where(['is_active'=>1, 'category_id'=>$this->id])->get();
        }
       return $data;
    }
}
