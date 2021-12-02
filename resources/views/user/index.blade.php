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
                            افزودن کاربر جدید
                        </div>
                        <div class="card-body">
                            <form action="/user/store" method="post">
                                @csrf
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control">
                                <br>
                                <label for="email">ایمیل</label>
                                <input type="email" name="email" class="form-control">
                                <br>
                                <label for="password">رمز عبور</label>
                                <input type="password" name="password" class="form-control">
                                <br>
                                <input type="submit" value="ارسال" class="btn btn-info">                                                       
                            </form>
                        </div>                
                        
                    </div> 
                </div> <!-- col-md-5 -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">لیست کاربران</div>
                        <div class="card-body">
                            <span>
                                تعداد کاربران فعال : {{ $userCount }}
                            </span>
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>ایمیل</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $key=>$user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>                                                
                                                <a href="/user/edit/{{$user->id}}" 
                                                class="btn btn-sm btn-success">
                                                    ویرایش
                                                </a>
                                                <a href="/user/delete/{{$user->id}}" 
                                                class="btn btn-sm btn-danger">
                                                    حذف
                                                </a>
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