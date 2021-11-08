<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        "nm_category", "slug"
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($category) {
            $category->slug = $category->createSlug($category->nm_category);
        });
        
        static::updating(function ($category) {
            $category->slug = $category->createSlug($category->nm_category);
        });
    }

    private static function createSlug($nm_category){
        $slug = Str::slug($nm_category, '-');
        if (!static::where('slug', $slug)->get()->isEmpty()) {
            $i = 1;
            $newSlug = $slug . '-' . '$i';
            while (!static::where('slug', $newSlug)->get()->isEmpty()){
                $i++;
                $newSlug = $slug . '-' . $i;
            }
            $slug = $newSlug;
        }
        return $slug;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
