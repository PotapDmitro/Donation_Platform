<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;

class MainController extends Controller
{
    public function index()
    {
        $posts = Donator::paginate(10);
        return view('layouts.main', compact('posts'));
    }
}
