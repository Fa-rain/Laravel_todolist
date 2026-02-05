@extends('layouts.default')

@section('content')
    <div class="container mb-4 ">
        <div class="d-flex flex-row">
            <a href="/add" class="btn btn-success">Add [+]</a>
            <form action="">
                <select name="status" id="status" class="form-select mx-2">
                    <option value="">Pending</option>
                    <option value="">Done</option>
                </select>
            </form>
        </div>
    </div>

    <div class="container">
        @foreach ($data_todolist as $todo )

        <div class="card" style="width:400px">
            <div class="card-body">
                <div class="card-title">{{$todo['title']}}</div>
                <div class="card-content">
                    <div class="card-text">{{$todo['description']}}</div>
                    <div class="card-text"> Status : {{$todo['status']}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
