@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <a  href="{{ url('add-ticket')}}"  class="btn btn-info float-right mt-0" >Add <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
            <h4>Events Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-boardered table-tsriped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Number of Tickets</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticket as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ asset('/assets/uploads/tickets/' . $item->image) }}"
                                    style="width: 70px; height:70px">
                            </td>
                            <td>{{ $item->getEventDate($item->id)}}</td>
                            <td>{{ $item->getEventTime($item->id) }}</td>
                            <td>{{ $item->getQuatitySum($item->id) }}</td>
                            <td>
                            <a href="{{ url('view-ticket/' . $item->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ url('edit-ticket/' . $item->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{ url('delete-ticket/' . $item->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
@endsection
