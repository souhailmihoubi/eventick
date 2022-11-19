@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="card">
        <div class="card-header">
            <h4>Add Ticket</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-ticket')}}"  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" aria-label="Default select example" class="form-select" required>
                            <option value="">Select a category</option>
                            @foreach ($category as $item)
                                <option value=" {{ $item->id }} ">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="discription" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
@endsection
