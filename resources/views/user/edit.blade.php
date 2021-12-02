@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    ویرایش کاربر : {{ $user->name }}
                </div>
                <div class="card-body">
                    <form action="{{ url('user/update/'.$user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="name">نام</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        <br>
                        <label for="email">ایمیل</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        <br>
                        <label for="password">رمز عبور</label>
                        <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        <br>
                        <input type="submit" value="ویرایش" class="btn btn-info">                        
                        
                    </form>
                </div>                               
            </div> 
        </div> <!-- col-md-10 -->
    </div>
@endsection