@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <a  href="{{ url('add-places')}}"  class="btn btn-info float-right mt-0" >Add <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
            <h4>Places Page</h4>
            <hr>
        </div>
        <div class="row">
            <div class="">
                <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/searchgov')}}">
                    <input type="search" name="query" class="form-control mr-sm-2 " placeholder="Search for Government">
                    <button type="submit" class="btn btn-dark my-2 my-sm-0">Search</button>
                </form>
            </div>
            
        </div>
        
        <div class="card-body">
            <table class="table table-boardered table-tsriped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Government</th>
                        <th>Nombre Max</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($places as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->government->name }}</td>
                            <td>{{ $item->nbMax }}</td>
                            <td>
                            <a href="{{ url('edit-places/' . $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <a href="{{ url('delete-places/' . $item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
