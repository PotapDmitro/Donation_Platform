<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }
}
