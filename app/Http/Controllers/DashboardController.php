<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Services\Service;



class DashboardController extends Controller
{
    public function __construct(public Service $service)
    {
    }

    public function index()
    {
        return view('dashboard', [
            'posts' => Donator::paginate(10),
            'chartData' => $this->service->chartData(),
            'maxAmount' => $this->service->topDonate(),
            'resultSum' => $this->service->allSum(),
            'resultName' => $this->service->topName(),
            'resultSumMonth' => $this->service->lastMonth(),
        ]);
    }
}
