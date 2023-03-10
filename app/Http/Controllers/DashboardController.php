<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // $amountDate = Donator::select(DB::raw("SUM('Amount') as summ"))
        // ->whereYear("created_at", date('Y-m-d'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->pluck('summ');

        // $amountDate = DB::table('donators')
        //     ->select(
        //         DB::raw("year(created_at) as year"),
        //         DB::raw("SUM(Amount) as amount"),
        //     )
        //     ->groupBy(DB::raw("year(created_at)"))
        //     ->get();
        // $result[] = ['Year', 'Amount'];
        // foreach ($amountDate as $key => $value) {
        //     $result[++$key] = [$value->year, $value->amount];
        // }

        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts'));
    }
}
