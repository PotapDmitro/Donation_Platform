<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // $amountDate = DB::table('donators')
        //     ->select(DB::raw('SUM(amount)'))
        //     ->groupBy(DB::raw("Month(created_at)"))
        //     // ->get();
        //     ->pluck('amount');
        // dd($amountDate);
        //     ->groupBy(DB::raw("year(created_at)"))
        //     ->get();
        // $result[] = ['Year', 'Amount'];
        // foreach ($amountDate as $key => $value) {
        //     $result[++$key] = [$value->year, $value->amount];
        // }
        // $amounTime = DB::select("created_at");
        $amountDate = Donator::select(DB::raw("SUM(amount) as amount"))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('amount');

        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts', 'amountDate'));
    }
}
