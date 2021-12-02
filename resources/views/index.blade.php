@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @if (Auth::check())
                        {{ $user->email }}
                    @endif
                </div>
                <div class="card-body">
                    <form action="/store" method="post" class="form-group">
                        @csrf
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control">
                        <br>
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" class="form-control">
                        <br>
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                        <br>
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" value="send">
                    </form>
                    <form action="/upload" class="dropzone" id="my-awesome-dropzone">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection