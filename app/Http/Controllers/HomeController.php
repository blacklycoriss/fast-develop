<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',
        ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function create()
    {
        return view('bb-create');
    }

    public function store(Request $request)
    {
        Auth::user()->bbs()->create(['title' => $request->input('title'),
            'content' => $request->input('content'),
            'price' => $request->input('price')]);

        return redirect()->route('home');
    }

    public function edit(Bb $bb)
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    public function update(Request $request, Bb $bb)
    {
        $bb->fill(['title' => $request->input('title'),
            'content' => $request->input('content'),
            'price' => $request->input('price')]);
        $bb->save();

        return redirect()->route('home');
    }

    public function delete(Bb $bb)
    {
        return view('bb-delete', ['bb' => $bb]);
    }
}
