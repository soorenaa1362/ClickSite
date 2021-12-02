@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    افزودن پست جدید
                </div>
                <div class="card-body">
                    <form action="{{ route('post.create') }}" method="post">
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
                        <label for="title">عنوان مقاله</label>
                        <input type="text" name="title" class="form-control">
                        <br>
                        <label for="content">متن مقاله</label>
                        <textarea name="content" rows="3" class="form-control"></textarea>
                        <br>
                        <input type="submit" value="ارسال" class="btn btn-primary">                        
                        
                        <!-- @foreach ($errors->get('title') as $message)
                            {{ $message }}
                        @endforeach -->
                    </form>
                </div>                
                
            </div> 
        </div> <!-- col-md-10 -->
    </div>
@endsection