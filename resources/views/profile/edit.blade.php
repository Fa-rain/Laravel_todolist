@extends('layouts.default')

@section('content')
    <div class="card" style="width:600px; margin:auto">
        <div class="card-header">Edit Profile</div>
        <div class="card-body">
            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                            value="{{$data_user->username}}">
                            @error('username')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                            value="{{$data_user->email}}">
                            @error('email')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit" style="width:100%">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
