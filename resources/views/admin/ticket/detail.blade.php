@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <div class="card">
        <div class="card-header">
            <h4>Add Ticket</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-ticket/'.$ticket->id) }}" method="POST" >
                
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{$ticket->category->name}}</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$ticket->name}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="discription" rows="3" class="form-control">{{$ticket->discription}}</textarea>
                    </div>

                    
                    @if($ticket->image)
                        <img src="{{ asset('assets/uploads/tickets/'.$ticket->image) }}" alt="" style="width: 100px; height:100px"> 
                    @endif

                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
