<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LightApp;
use App\Models\App;
use App\Models\LightAppCategory;


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
        return view('home');
    }

    public function dashboard()
    {
        $apps = App::all();
        $lightApps = LightApp::with('category')->get();
       
        return view('dashboard', compact('apps', 'lightApps'));
       
    }
}
