@extends('layouts.default')

@section('content')
<div class="card" style="width:600px; margin:auto">
    <div class="card-header"><h2>My Profile</h2></div>
    <div class="card-body">
        <div class="card-text"><b>Username:</b> {{ $data_user->username }}</div>
        <div class="card-text mb-3"><b>Email:</b> {{ $data_user->email }}</div>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            Edit Profile</a>
    </div>
</div>

@endsection
