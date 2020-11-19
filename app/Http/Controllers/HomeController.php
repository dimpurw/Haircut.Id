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
        $data_barbershop = \App\Barbershop::all();
        return view('page.index', ['data_barbershop' => $data_barbershop]);
    }
}
