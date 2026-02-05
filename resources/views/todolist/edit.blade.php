@extends('layouts.default')

@section('content')
    <div class="card" style="width:600px; margin:auto">
        <div class="card-header">Edit To Do List</div>
        <div class="card-body">
            <form action="/todolist/{{$data_todolist->id_todolist}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                            value="{{$data_todolist->title}}">
                            @error('title')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="id_category" id="category" class="form-select">
                                <option selected value="">Choose Category</option>
                                @foreach ( $data_category as $item )
                                    @if ($item->id_category == $data_todolist->id_category)
                                        <option value="{{$item->id_category}}" selected>{{$item->category_name}}</option>
                                    @else
                                        <option value="{{$item->id_category}}">{{$item->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="dateline" class="form-label">Dateline</label>
                            <input type="datetime-local" name="dateline" id="dateline" class="form-control"
                            value="{{$data_todolist->dateline}}">
                            @error('dateline')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5"
                            class="form-control">{{$data_todolist->description}}</textarea>
                            @error('description')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit" style="width:100%">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

