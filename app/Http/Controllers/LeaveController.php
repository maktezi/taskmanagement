<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function admin()
    {
        $leaves = Leave::all();
        return view('admin.leave.admin',compact('leaves'));
    }

    public function index()
    {
        $leaves = Leave::where('user_id', auth()->user()->id)->get();
        return view('admin.leave.index',compact('leaves'));
    }

    public function add(){
        return view('admin.leave.add');
    }

    public function viewpdf($id)
    {
        $leave = Leave::find($id);
        return view('admin.leave.viewpdf', compact('leave'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            Leave::create([
                'user_id'=> auth()->user()->id,
                'office' => $request->office,
                'fname'=> $request->fname,
                'mname'=> $request->mname,
                'lname'=> $request->lname,
                'suffix'=> $request->suffix,
                'date_filing' => $request->date_filing,
                'position' => $request->position,
                'salary' => $request->salary,
                'approved_by' => $request->approved_by,
                'designation' => $request->designation,
            ]);
        });
        return view('admin.leave.success');
        return redirect()->back();
    }
}
