@extends('layouts.admin')

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <div class="card">
        <div class="card-header">
            <h4>Edit Ticket</h4>
            @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
        </div>
        <div class="card-body">
            <form action="{{ url('update-ticket/' . $ticket->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <select class="form-select" required>
                            <option value="">{{ $ticket->category->name }}</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $ticket->name }}" >
                    </div>

                    <div class="col-9">
                        <label for="">Description</label>
                        <textarea name="discription" rows="3" class="form-control">{{ $ticket->discription }}</textarea>
                    </div>

                    <div class="col">
                        @if ($ticket->image)
                            <img src="{{ asset('assets/uploads/tickets/' . $ticket->image) }}" alt=""
                                style="width: 100px; height:100px">
                        @endif
                    </div>

                    <div class="col-10">
                        <input type="file" class="form-control" name="image">
                    </div>



                    <div class="col-md-12 col-sm-12" id="type">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td><input type='text' name='name[]' class='form-control'
                                                value='{{ $type->getTypeName($type->type_id) }}' id='name' disabled>
                                        </td>
                                        <td><input type='number' name='price[]' class='form-control'
                                                value='{{ $type->Price }}' id='price'></td>
                                        <td><input type='number' name='quantity[]' class='form-control'
                                                value='{{ $type->quantity }}' id='quantity' ></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-md-6 mb-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ $time->date }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Time</label>
                            <input type="time" class="form-control" name="time" value="{{ $time->time }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    
            </form>
        </div>
    </div>
@endsection


