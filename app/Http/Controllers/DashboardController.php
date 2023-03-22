<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $amountDate = Donator::selectRaw("DATE_FORMAT(created_at, '%d-%m-%Y') as date, SUM(amount) as amount")
            ->groupByRaw("DATE_FORMAT(created_at, '%d-%m-%Y')")
            ->get();
        $result = [];
        foreach ($amountDate as $date) {
            $result[$date->date] = $date->amount;
        };
        // All time amounth
        $sumData = DB::table('donators')->select(DB::raw("SUM(amount) as sumData"))
            ->get();
        $resultSum = [];
        foreach ($sumData as $amountSum) {
            $resultSum = $amountSum;
        }
        //Top Donator (amount)
        $maxDonator = Donator::select(DB::raw("max(amount) as amountDonator"))
            ->get();
        $maxAmount = [];
        foreach ($maxDonator as $resMaxAmount) {
            $maxAmount = $resMaxAmount;
        }
        //Top Donator (name)
        $nameDonator = DB::table('donators')->select(DB::raw("name as nameDonator"))
            ->orderByDesc("amount")
            ->limit(1)
            ->get()->toArray();
        $resultName = [];
        foreach ($nameDonator as $AmMaxName) {
            $resultName = $AmMaxName;
        }
        //Last Month
        $lastMonth = DB::table('donators')->select(DB::raw("amount"))
            ->whereMonth("created_at", now()->endOfMonth())
            ->get()->toArray();
        $resultSumMonth = [];
        foreach ($lastMonth as $resultMonth) {
            $resultSumMonth[] += $resultMonth->amount;
        }
        $monthRess = array_sum($resultSumMonth);
        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts', 'result', 'resultSum', 'maxAmount', 'resultName', 'resultSumMonth', 'monthRess'));
    }
}
