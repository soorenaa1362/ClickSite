@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">            
                    <div class="card">
                        <div class="card-header">
                            افزودن پست جدید
                        </div>
                        <div class="card-body">
                            <form action="/post" method="post">
                                @csrf
                                @if($errors->all())
                                    <div class="alert alert-danger mt-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="text" name="name" class="form-control">
                                <br>
                                <input type="text" name="email" class="form-control">
                                <br>
                                <input type="text" name="status" class="form-control">
                                <br>
                                <input type="text" name="password" class="form-control">
                                <br>
                                <textarea name="text" rows="3" class="form-control"></textarea>
                                <br>
                                <input type="submit" value="ارسال" class="btn btn-primary">                        
                                
                                <!-- @foreach ($errors->get('title') as $message)
                                    {{ $message }}
                                @endforeach -->
                            </form>
                        </div>                
                        
                    </div> 
                </div> <!-- col-md-5 -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">لیست کاربران</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>وضعیت</th>
                                        <th>ایمیل</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key=>$user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="/delete/{{ $user->id }}">
                                                    <button class="btn btn-sm btn-danger">حذف</button>
                                                </a>
                                                <!-- <form action="/delete/{{ $user->id }}">
                                                    <button type="post" class="btn btn-sm btn-danger">
                                                        حذف
                                                    </button>
                                                </form> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- Card Body -->
                    </div> <!-- Card -->       
                </div> <!-- col-md-7 -->
            </div> <!-- Row -->
        </div> <!-- col-md-10 -->
    </div>
@endsection