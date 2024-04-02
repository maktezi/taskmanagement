<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    public function admin()
    {
        $tasks = Task::all();
        return view('admin.task.admin',compact('tasks'));
    }

    public function index()
    {
        // $tasks = task::where('user_id', auth()->user()->id)->get();
        $tasks = Task::all();
        return view('admin.task.index',compact('tasks'));
    }

    public function add(){
        return view('admin.task.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try{
            Task::create([
                'user_id'=> auth()->user()->id,
                'name'=> $request->name,
                'difficulty'=> $request->difficulty,
                'priority'=> $request->priority,
            ]);

            Alert::success('Submitted!');
            // return redirect('/task');
            return redirect()->back();

        //     } catch(\Exception $e){
        //     Alert::warning('Something went wrong, please try again.');
        //     return redirect()->back();
        // }
    }

    public function edit($id)
    {
        $data = Task::find($id);
        return view('admin.task.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Task::find($id);
        $data->name = $request->input('name');
        $data->difficulty = $request->input('difficulty');
        $data->priority = $request->input('priority');
        $data->save();

        Alert::success('Updated!');
        // return redirect('/task');
        return redirect()->back();
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        Alert::toast('Successfully Deleted!');
        return redirect()->back();
    }

}
