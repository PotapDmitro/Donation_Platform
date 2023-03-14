<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;

class Dashboard extends Controller
{
    public function index()
    {
        $posts = Donator::paginate(10);
        return view('dashboard', compact('posts'));
    }
}
