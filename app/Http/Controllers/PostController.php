<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donator;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'Name' => 'string',
            'Email' => 'email',
            'Amount' => 'numeric',
            'Message' => 'string',
        ]);
        Donator::create($data);
        return redirect()->route('dashboard');
    }
}
