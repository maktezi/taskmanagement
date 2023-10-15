<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Appearance;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalLeave = Leave::count();
        $totalAppearance = Appearance::count();
        return view('admin.dashboard',compact('totalLeave','totalAppearance'));
    }

}
