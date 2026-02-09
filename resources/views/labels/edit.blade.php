@extends('layouts.default')

@section('content')
    <div class="card" style="width:600px; margin:auto">
        <div class="card-header">Edit Label</div>
        <div class="card-body">
            <form action="/labels/{{$data_label->id_label}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" name="label_name" id="lable_name" class="form-control"
                            value="{{$data_label->label_name}}">
                            @error('lable_name')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <button class="btn btn-success" type="submit" style="width:100%">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

