<?php

namespace App\Http\Controllers;

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
        if ($request->session()) {
            return view('admin/pages/dashboard', get_defined_vars());
        } else {
            $request->session()->flash('error', 'You Can not access this page before login');
            return view('admin.include.login');
        }
       //return view('frontend.pages.home');
    }
}
