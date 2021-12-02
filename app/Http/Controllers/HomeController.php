<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        return view('home');
    }



    public function create()
    {
        // $users = DB::table('users')->get();
        // $users = DB::table('users')->orderBy('id', 'DESC')->get();
        // return $users;

        // return view('post.index', ['users' => $users]);
        // return view('post.index', compact('users'));

        // $user_id = Auth::user()->id;
        // $user = DB::table('users')->where('id', $user_id)->first();
        // return view('post.index', compact('user'));

        // $usersEmails = DB::table('users')->pluck('email');
        // return view('post.index', compact('usersEmails'));

        // $users = DB::table('users')->select(DB::raw('count(*) as user_count, status'))
        //     ->where('status', 1)->groupBy('status')->get();
        
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', 'contacts.user_id')->get();

        // $users = DB::table('users')->join('contacts', function($join){
        //     $join->on('users.id', '=', 'contacts.user_id')->where('users.status', 0); 
        // })->get();


        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', 'contacts.user_id')
        //     ->where('contacts.user_id', '>', 1)
        //     ->get();

        // $users = DB::table('users')->where('name', 'like', '%n%')->get();

        // $users = DB::table('users')->whereNotIn('id', [4,5])->get();

        // $users = DB::table('users')->inRandomOrder('id', 'ASC')->get();        
        // $users = DB::table('users')->select('name')->groupBy('name')->get();        

        // $users = DB::table('users')->select('id')
        //     ->groupBy('id')
        //     ->having('id', '>', 2)
        //     ->get();        

        // $users = DB::table('contacts')
        //     ->select('fname', DB::Raw('sum(sale) as total'))
        //     ->groupBy('fname')
        //     ->havingRaw('sum(sale) > 1500')
        //     ->get(); 

        // $users = DB::table('users')->orderBy('id', 'DESC')->take(2)->get();
        // $users = DB::table('users')->skip(3)->skip(2)->get();

        // return $users;

        $users = DB::table('users')->get();

        return view('post.index', compact('users'));
    }


    public function store(Request $request)
    {

        // $validator = Validator::make($request->all(),[
        //     'title' => 'required|max:5',
        //     'text' => 'required|max:10'
        // ]);
        
        // if($validator->fails()){
        //     return redirect('/create/post')->withErrors($validator)->withInput();
        // }

        // $status = $request->title;
        // return DB::table('users')->when($status, function($query) use ($status){
        //     $query->where('status', $status);
        // })->get();
        
        // $status = $request->title;
        // $users = DB::table('users')->where('status', $status)->get();
        // return $users;

        // $insert = DB::table('users')
        //     ->insert(['name'=>'aarash', 'email'=>'aarash@gmail.com', 'status'=>'1', 'password'=>'123456789']);
        // if($insert){
        //     return 'Send';
        // }

        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'status' => $request->status,
        //     'password' => Hash::make($request->password),
        // ]);

        // $update = DB::table('users')->where('id', 14)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'status' => $request->status,
        //     'password' => Hash::make($request->password),
        // ]);
        

    }


    public function destroy($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if($delete){
            return "کاربر مورد نظر حذف شد.";
        }
    }

}
