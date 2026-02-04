@extends('auth.layouts.default')
@section('content')

    <div class="container mt-5 bg-white p-5 rounded-4" style="width:400px">
        <center><p class = "ms-auto h1">Login</p></center>
        <center><small>Please fill the forms </small></center>
        <form method="POST" action="{{route('login.post')}}">
            @csrf
            <div class="mb-2 mt-2">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name = "username">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning">
                        {{session('error')}}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-dark mb-3" style="width:100%; padding:8px">Submit</button>
            <hr>
            <center>Doesn't have one? <a href="/register">Register here</a></center>
        </form>
    </div>

@endsection
