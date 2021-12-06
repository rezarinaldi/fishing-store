<?php

namespace App\Http\Controllers\Ap;

use App\Chart;
use App\Dashboard;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(Dashboard $dashboard)
    {
        $orders = Order::select(
            DB::raw('year(date) as year'),
            DB::raw('sum(quantity) as quantity'),
            DB::raw('sum(total_price) as total')
        )
            ->orderBy(DB::raw("YEAR(date)"))
            ->groupBy(DB::raw("YEAR(date)"))
            ->get();
        
        $result[] = ['Year', 'quantity', 'total'];
        foreach ($orders as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->quantity, (int)$value->total];
            info($result);
        }
        // return view('productChart')->with('product_name', json_encode($result));
        // $orderss = Order::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        // ->get();
        // $orders = Order::all();
        // return view('chart', compact('chart'));
        return view('pages\ap\dashboard', [
            'item' => $dashboard->countData('item'),
            'category' => $dashboard->countData('category'),
            'order' => $dashboard->countData('order')
            // 'orders' => $orders
        ])->with('quantity', json_encode($result));
    }
}
