@extends('layouts.admin')

@section('content')
    <div class="header">
        <h4>Ticket {{ $ticket->name }}</h4>
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <section style="background-color: #eee;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <div class="card text-black">
                        <img src="{{ asset('assets/uploads/tickets/' . $ticket->image) }}" class="card-img-top " style=" width: 200px; height:200p; display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%; "/>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="card-title">{{ $ticket->name }}</h5>
                                <p class="text-muted mb-4">{{ $ticket->discription }}</p>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span>Government</span><span>{{$geverment->name}}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Place</span><span>{{$place->name}}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Date</span><span>{{$time->date}}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Time</span><span>{{$time->time}}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                <span>Ticket Type</span><span>Price</span><span>Quantity</span>
                            </div>
                            <hr>
                            
                            
                            @foreach ($types as $type)
                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                <span>{{$type->getTypeName($type->type_id)}}</span>
                                <span>{{$type->Price}} DT</span>
                                <span>{{$type->quantity}}</span>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <a href="{{ url('edit-ticket/' . $ticket->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ url('delete-ticket/' . $ticket->id) }}" class="btn btn-danger">Delete</a>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
