@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <div class="card">
        <div class="card-header">
            <h4>Add Places</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-places')}}"  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <select class="form-select" name="gov_id" aria-label="Default select example" class="form-select" required>
                            <option value="">Select a Government</option>
                            @foreach ($government as $item)
                                <option value=" {{ $item->id }} ">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Nombre Maximale</label>
                        <input type="number" name="nbMax" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
@endsection
