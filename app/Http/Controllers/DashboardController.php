<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $amountDate = DB::table('donators')->select(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as date, SUM(amount) as amount"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->get()->toArray();
        $result = [];
        foreach ($amountDate as $date) {
            $result[$date->date] = $date->amount;
        };
        // dd($result);
        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts', 'result'));
    }
}
