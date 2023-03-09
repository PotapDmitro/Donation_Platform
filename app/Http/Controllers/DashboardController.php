<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts'));
    }
}
