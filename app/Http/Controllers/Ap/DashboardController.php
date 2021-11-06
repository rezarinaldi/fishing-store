<?php

namespace App\Http\Controllers\Ap;

use App\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(Dashboard $dashboard)
    {
        return view('pages\ap\dashboard', [
            'item' => $dashboard->countData('item'),
            'category' => $dashboard->countData('category'),
            'order' => $dashboard->countData('order')
        ]);
    }
}
