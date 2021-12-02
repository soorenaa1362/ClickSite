<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::all();
        $users = User::where('status', 0)->get();
        $userCount = User::where('status', 1)->count();

        // $user = new User();
        // $user->name = 'Baabak';
        // $user->email = 'Baabak@gmail.com';
        // $user->save();

        return view('order.index', compact('users', 'userCount'));
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
}
