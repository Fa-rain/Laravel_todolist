@extends('layouts.default')

@section('content')
    <div class="container mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <div class="mb-2">
                <a href="/todolist/create" class="btn btn-primary">
                    + Add Todo
                </a>
            </div>
            <form method="GET" action="/todolist"
                class="d-flex gap-2 flex-nowrap">

                <!-- Search -->
                <input type="text" name="search" class="form-control"
                placeholder="Search..." value="{{ request('search') }}"
                style="width:180px">

                <!-- Status -->
                <select name="status"
                        class="form-select"
                        onchange="this.form.submit()"
                        style="width: 100px">

                    <option value="">Status</option>

                    <option value="pending"
                        {{ request('status')=='pending'?'selected':'' }}>
                        Pending
                    </option>

                    <option value="done"
                        {{ request('status')=='done'?'selected':'' }}>
                        Done
                    </option>
                </select>


                <!-- Category -->
                <select name="id_category"
                        class="form-select"
                        onchange="this.form.submit()"
                        style="width: 120px">

                    <option value="">Category</option>

                    @foreach($data_category as $category)
                        <option value="{{ $category->id_category }}"
                            {{ request('category')==$category->id_category ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>

            </form>
        </div>
        @if (@session('message'))
            <div class="flash-message alert alert-success">{{session('message')}}</div>
        @endif
    </div>

    <div class="container">
        <div class="row mx-auto">
            @foreach ($data_todolist as $todo )
            <div class="card col-sm-3 mx-1 my-2" style="width: 270px">
                <div class="card-body">
                    <div class="card-title"><h4>{{$todo['title']}}</h4></div>
                    <small style="color:rgb(155, 155, 155)">{{$todo['description']}}</small>
                    <div class="card-content my-4">
                        <div class="card-text"> Status : {{$todo['status']}}</div>
                        <div class="card-text">Dateline : {{ \Carbon\Carbon::parse($todo->dateline)->translatedFormat('l, d F Y H:i') }}</div>
                    </div>
                    <div class="d-flex">
                       <button type="button" class="btn btn-danger me-2" data-bs-toggle='modal'
                        data-bs-target='#delete{{$todo->id_todolist}}'>Delete</button>
                        <a href="/todolist/{{$todo->id_todolist}}/edit" class="btn btn-primary">Edit</a>
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
