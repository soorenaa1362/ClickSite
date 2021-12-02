<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('index', compact('user'));
    }

    public function store(Request $request)
    {
        return $request->all();
    }


    public function upload(Request $request)
    {
        $file = $request->file('file');

        $filname = time().$file->getClientOriginalName();
        $file->move('images', $filname);
    }
}
