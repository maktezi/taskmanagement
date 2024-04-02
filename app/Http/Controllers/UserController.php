<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            User::create([
                'user_id'=> auth()->user()->id,
                'name'=> $request->name,
                'email'=> $request->email,
                'password' => $request->password,
                'is_admin' => $request->is_admin,
                'date_of_birth'=> $request->date_of_birth,
                'position'=> $request->position,
                'salary'=> $request->salary,
            ]);

            Alert::success('User Created.');
            return redirect('/users');
            // return redirect()->back();

            } catch(\Exception $e){
            Alert::warning('Somenthing went wrong, please try again.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);

        if (!$user) {
            Alert::warning('User not found.');
            return redirect()->back();
        }

        $duplicateCheck = User::where('id', '!=', $id)
            ->where('email', $request->input('email'))
            ->first();

        if (!$duplicateCheck) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->is_admin = $request->input('is_admin');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->position = $request->input('position');
            $user->salary = $request->input('salary');

            $user->save();

            Alert::success('User updated.');
            return redirect('/users');
        } else {
            Alert::warning('Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $userToDelete = User::find($id);

        if (!$userToDelete) {
            return redirect()->back()->withErrors(['User not found']);
        }

        if (Auth::check() && $userToDelete->id === Auth::id()) {
            Alert::warning('You cannot delete your own account!');
            return redirect()->back();
        }

        $userToDelete->delete();
        Alert::success('User Deleted!');
        return redirect()->back();
    }

}
