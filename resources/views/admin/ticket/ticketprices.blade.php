@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="card">
        <div class="card-header">
            <h4>Type of Tickets</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('dashboard') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <form id="ticket_form" method="POST">
                <div class="row" id="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Number of Tickets</label>
                        <input type="number" class="form-control" name="nbr">
                    </div>
                    
                    
                </div>
            </form>
            <div class="col-md-12 mb-3">
                <button class="btn btn-primary" onclick="add_more()">Add Type +</button>
            </div>
        </div>
    </div>

@endsection

