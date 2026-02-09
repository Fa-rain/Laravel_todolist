@extends('layouts.default')

@section('content')
    <div class="card" style="width:600px; margin:auto">
        <div class="card-header">Add Label</div>
        <div class="card-body">
            <form action="/labels" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" name="label_name" id="lable_name" class="form-control"
                            value="{{old('lable_name')}}">
                            @error('lable_name')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <button class="btn btn-success" type="submit" style="width:100%">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
