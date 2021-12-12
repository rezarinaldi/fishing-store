<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "user_id", "item_id", "comment"
    ];

    protected $guarded = [];

    public function user_info()
    {
        return $this->hasOne(User::class);
    }

    public static function getAllReview()
    {
        return Review::with('user_info')->paginate(10);
    }

    public static function getAllUserReview()
    {
        return Review::where('user_id', auth()->user()->id)->with('user_info')->paginate(10);
    }
}
