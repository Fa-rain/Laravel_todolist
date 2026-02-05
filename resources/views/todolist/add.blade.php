@extends('layouts.default')

@section('content')
    <div class="card" style="width:600px; margin:auto">
        <div class="card-header">Add To Do List</div>
        <div class="card-body">
            <form action="/todolist" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                            value="{{old('title')}}">
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
                                    <option value="{{$item->id_category}}">{{$item->category_name}}</option>
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
                            value="{{old('dateline')}}">
                            @error('dateline')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5"
                            class="form-control">{{old('description')}}</textarea>
                            @error('description')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit" style="width:100%">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
