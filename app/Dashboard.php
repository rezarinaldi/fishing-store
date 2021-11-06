<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    public function countData()
    {
        return [
            'item' => DB::table('items')->count(),
            'category' => DB::table('categories')->count(),
            'order' => DB::table('orders')->count()
        ];
    }
}
