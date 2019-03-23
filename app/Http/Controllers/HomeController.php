<?php

namespace App\Http\Controllers;

use App\User;
use App\Charts\SampleChart;
use App\Charts\googleChart;
use Illuminate\Http\Request;

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

        $chart = new \App\Charts\highChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('Total User',['30', '50', '90']);

        $data['chart'] = $chart;


        return view('dashboard/home',$data);
    }
}
