<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id", "shipping_method", "status", 'transfers_slip'
    ];

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReview()
    {
        return $this->hasMany(User::class)->with('user_info')->orderBy('id', 'DESC');
    }
}
