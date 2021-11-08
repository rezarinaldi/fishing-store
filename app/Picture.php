<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        "item_id", "value"
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($file) {
            if (file_exists($file->file)) {
                unlink($file->file);
            }
        });
    }
}
