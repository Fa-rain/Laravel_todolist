@extends('layouts.default')

@section('content')
<div class="card mb-3" style="width:600px; margin:auto">
    <div class="card-header"><h2>My Profile</h2></div>
    <div class="card-body">
        <div class="card-text"><b>Username:</b> {{ $data_user->username }}</div>
        <div class="card-text mb-3"><b>Email:</b> {{ $data_user->email }}</div>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            Edit Profile</a>
    </div>
</div>

<div class="card" style="width: 600px; margin:auto">
    <div class="card-header"><h2>My Labels</h2></div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Label Name</th>
                <th>Action</th>
            </tr>
            @foreach ($data_label as $label )
            <tr>
                <td><span class="badge text-bg-secondary">{{$label->label_name}}</span></td>
                <td>
                    <a href="labels/{{$label->id_label}}/edit" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger me-2" data-bs-toggle='modal'
                    data-bs-target='#delete{{$label->id_label}}'>Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="card-text">
            <a href="/labels/create" class="btn btn-success">Add Label</a>
        </div>
    </div>
</div>

@foreach($data_label as $label)
    <div class="modal fade" id="delete{{$label->id_label}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action ="/labels/{{$label->id_label}}" method ="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete <b>{{$label->label_name}}</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach


@endsection
