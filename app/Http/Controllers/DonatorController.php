<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonatorRequest;
use Illuminate\Http\Request;
use App\Models\Donator;

class DonatorController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(StoreDonatorRequest $request)
    {
        $data = $request->validated();
        Donator::create($data);
        return redirect()->route('dashboard');
    }

    /**
     * Testing controller
     */
    public function testStore(StoreDonatorRequest $request)
    {
        $data = $request->validated();
        Donator::create($data);
    }
}
