<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function admin()
    {
        $Departments = Department::all();
        return view('admin.department.admin',compact('Departments'));
    }

    public function index()
    {
        // $Departments = Department::where('user_id', auth()->user()->id)->get();
        $Departments = Department::all();
        return view('admin.department.index',compact('Departments'));
    }

    public function add(){
        return view('admin.department.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try{
            Department::create([
                'user_id'=> auth()->user()->id,
                'name'=> $request->name,
                'description'=> $request->description,
            ]);

            Alert::success('Submitted!');
            return redirect()->back();
        //     } catch(\Exception $e){
        //     Alert::warning('Something went wrong, please try again.');
        //     return redirect()->back();
        // }
    }

    public function edit($id)
    {
        $data = Department::find($id);
        return view('admin.department.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Department::find($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->save();

        Alert::success('Updated!');
        return redirect()->back();
    }

    public function delete($id)
    {
        Department::find($id)->delete();
        Alert::toast('Successfully Deleted!');
        return redirect()->back();
    }

}
