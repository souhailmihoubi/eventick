@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="card">
        <div class="card-header">
            <h4>Event Date/Time</h4>  
        </div>
        <div class="card-body">
            {{$idt = $ticket->id}}
            {{$idp = $place->id}}
            <form action="{{url('insert/ticket/'.$idt.'/place/'.$idp.'/datetime/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Ticket Name</label>
                        <input type="text" value="{{$ticket->name}}" class="form-control" name="ticket" disabled >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Place Name</label>
                        <input type="text" value="{{$place->name}}" class="form-control" name="place" disabled >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Time</label>
                        <input type="time" class="form-control" name="time" required> 
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
