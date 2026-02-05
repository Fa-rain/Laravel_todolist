@extends('layouts.default')

@section('content')
    <div class="container mb-4">
        <div class="d-flex flex-row">
            <a href="todolist/create" class="btn btn-success mx-1">Add [+]</a>
            <form action="">
                <select name="status" id="status" class="form-select mx-2">
                    <option value="">Pending</option>
                    <option value="">Done</option>
                </select>
            </form>
        </div>
        @if (@session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
    </div>

    <div class="container">
        <div class="row mx-auto">
            @foreach ($data_todolist as $todo )
            <div class="card col-sm-3 mx-1 my-2" style="width: 270px">
                <div class="card-body">
                    <div class="card-title">{{$todo['title']}}</div>
                    <div class="card-content mb-5">
                        <small>{{$todo['description']}}</small>
                        <div class="card-text"> Status : {{$todo['status']}}</div>
                    </div>
                    <div class="d-flex">
                       <button type="button" class="btn btn-danger" data-bs-toggle='modal'
                        data-bs-target='#delete{{$todo->id_todolist}}'>Delete</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Delete Modal --}}
    @foreach($data_todolist as $todo)
    <div class="modal fade" id="delete{{$todo->id_todolist}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action ="/todolist/{{$todo->id_todolist}}" method ="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete <b>{{$todo->title}}</b>?</p>
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
