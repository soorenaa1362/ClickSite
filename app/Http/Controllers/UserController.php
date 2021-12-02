<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $status = 1;
        $users = User::Status($status)->get(); // Local Dynamic Scope

        $users = User::Status()->get(); // Local Static Scope
        $userCount = User::where('status', 1)->count();

        return view('user.index', compact('users', 'userCount'));
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($user->save())
        {
            return ("کاربر با موفقیت به دیتابیس افزوده شد!");
        }
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->update();
        redirect()->route('user.index');
    }


    public function delete($id)
    {
        $user = User::find($id);
        
        if($user->trashed()){
            $user->forceDelete();
        }else{
            $user->delete(); 
        }

        return back();
    }



    public function deletedIndex()
    {
        $users = User::onlyTrashed()->get();
        return view('user.deleted.index', compact('users'));
    }



    public function deletedRestore($id)
    {
        User::where('id', $id)->restore();  
        return back();
    }



    public function deletedForce($id)
    {
        User::where('id', $id)->forceDelete();     
        return back();   
    }


}
