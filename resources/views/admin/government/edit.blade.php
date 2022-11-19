@extends('layouts.admin')

@section('content')

<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<div class="card">
    <div class="card-header">
        <h4>Edit/Update Government</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-government/'.$government->id) }}" method="POST">
            @csrf 
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $government->name }}" class="form-control" name="name" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection