<?php

namespace App\Http\Controllers\Ap;

use App\Chart;
use App\Dashboard;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
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
        $orders = OrderDetails::select(
            DB::raw('year(date) as year'),
            DB::raw('sum(total_price) as total')
        )
            ->orderBy(DB::raw("YEAR(date)"))
            ->groupBy(DB::raw("YEAR(date)"))
            ->get();
        
        $result[] = ['Year', 'Total Sales'];
        foreach ($orders as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->total];
            info($result);
        }
        return view('pages\ap\dashboard', [
            'item' => $dashboard->countData('item'),
            'category' => $dashboard->countData('category'),
            'order' => $dashboard->countData('order')
        ])->with('quantity', json_encode($result));
    }
}
