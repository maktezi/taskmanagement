<?php

namespace App\Http\Controllers;

use App\Models\AssignTask;
use App\Models\Department;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssignTaskController extends Controller
{
    public function admin()
    {
        $assigntasks = AssignTask::all();
        return view('admin.assigntask.admin',compact('assigntasks'));
    }

    public function index()
    {
        $assigntasks = AssignTask::where('user_id', auth()->user()->id)->get();
        return view('admin.assigntask.index',compact('assigntasks'));
    }

    public function add(){
        $users = User::all()->sortBy('name');
        $tasks = Task::all()->sortBy('name');
        $departments = Department::all()->sortBy('name');
        return view('admin.assigntask.add',compact('users','tasks','departments'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = User::where('id', $request->user_id);
        $task = Task::where('id', $request->task_id);
        $department = Department::where('id', $request->department_id);

        if ($user && $task && $department) {
            AssignTask::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'task_id' => $request->task_id,
                'department_id' => $request->department_id,
        ]);

        Alert::success('Successfully Created!');
        return redirect()->back();
        } else {
            Alert::warning('Something went wrong, Please try again.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = AssignTask::find($id);
        $users = User::all()->sortBy('name');
        $tasks = Task::all()->sortBy('name');
        $departments = Department::all()->sortBy('name');
        return view('admin.assigntask.edit', compact('data','users','tasks','departments'));
    }

    public function update(Request $request, $id)
    {
        $data = AssignTask::find($id);
        $user = User::find($request->input('user_id'));
        $task = Task::find($request->input('task_id'));
        $department = Department::find($request->input('department_id'));

        if ($user && $task && $department) {
            $duplicateCheck = AssignTask::where('user_id', $request->input('user_id'))
                ->where('task_id', $request->input('task_id'))
                ->where('department_id', $request->input('department_id'))
                ->where('id', '!=', $id)
                ->first();

            if (!$duplicateCheck) {
                $data->user_id = $request->input('user_id');
                $data->task_id = $request->input('task_id');
                $data->department_id = $request->input('department_id');
                $data->name = $request->input('name');
                $data->description = $request->input('description');

                $data->save();
                Alert::success('Successfully Updated!');
                return redirect()->back();

            } else {
                Alert::warning('Duplicate entry detected. Please enter a unique value.');
                return redirect()->back();
            }
        } else {
            Alert::warning('Invalid data provided.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        AssignTask::find($id)->delete();
        Alert::toast('Successfully Deleted!');
        return redirect()->back();
    }

}
