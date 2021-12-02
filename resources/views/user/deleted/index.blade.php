@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">لیست کاربران</div>
                <div class="card-body">
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
                                        <a href="/user/deleted/restore/{{$user->id}}" 
                                        class="btn btn-sm btn-success">
                                            بازگردانی
                                        </a>
                                        <a href="/user/deleted/force/{{$user->id}}" 
                                        class="btn btn-sm btn-danger">
                                            حذف کامل
                                        </a>
                                    </td>
                                </tr>
                            @endforeach                                   
                        </tbody>
                    </table>
                </div> <!-- Card Body -->
            </div> <!-- Card -->       
                
        </div> <!-- col-md-10 -->
    </div>
@endsection