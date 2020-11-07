<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barbershop = \App\Barbershop::all();
        return view('page.index', ['barbershop' => $barbershop]);
        // return view('page.index');
    }
}
