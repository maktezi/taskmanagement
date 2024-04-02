<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    public function admin()
    {
        $activities = Activity::all();
        return view('admin.activity.admin',compact('activities'));
    }

    public function index()
    {
        // $activities = activity::where('user_id', auth()->user()->id)->get();
        $activities = Activity::all();
        return view('admin.activity.index',compact('activities'));
    }

    public function add(){
        return view('admin.activity.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try{
            Activity::create([
                'user_id'=> auth()->user()->id,
                'name'=> $request->name,
                'description'=> $request->description,
            ]);

            Alert::success('Submitted!');
            return redirect('/activity');
            // return redirect()->back();

        //     } catch(\Exception $e){
        //     Alert::warning('Something went wrong, please try again.');
        //     return redirect()->back();
        // }
    }

    public function edit($id)
    {
        $data = Activity::find($id);
        return view('admin.activity.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Activity::find($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->save();

        Alert::success('Updated!');
        return redirect('/activity');
        // return redirect()->back();
    }

    public function delete($id)
    {
        Activity::find($id)->delete();
        Alert::toast('Successfully Deleted!');
        return redirect()->back();
    }

}
