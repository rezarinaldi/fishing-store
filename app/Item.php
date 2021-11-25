<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    protected $fillable = [
        "category_id", "nm_items", "description", "quantity", "price", "discount"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->slug = $item->createSlug($item->nm_items);
        });
        static::updating(function ($item) {
            $item->slug = $item->createSlug($item->nm_items);
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($nm_items)
    {
        $slug = Str::slug($nm_items, '-');
        if (!static::where('slug', $slug)->get()->isEmpty()) {
            $i = 1;
            $newSlug = $slug . '-' . $i;
            while (!static::where('slug', $newSlug)->get()->isEmpty()) {
                $i++;
                $newSlug = $slug . '-' . $i;
            }
            $slug = $newSlug;
        }
        return $slug;
    }
}
