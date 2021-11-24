<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
