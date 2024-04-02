<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalUser = User::count();
        $totalDepartment = Department::count();
        return view('admin.dashboard',compact('totalUser', 'totalDepartment'));
    }

}
