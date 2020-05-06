<?php

namespace App\Http\Controllers;

use App\Charts\UserLineChart;
use App\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chartLine()
    {
        $api = url('/chart-line-ajax');

        $chart = new UserLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);

        return view('chartLine', compact('chart'));
    }

    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $users = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', $year)
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        $chart = new UserLineChart;

        $chart->dataset('New User Register Chart', 'line', $users)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return $chart->api();
    }
}
