@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <a  href="{{ url('add-government')}}"  class="btn btn-info float-right mt-0" >Add <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </a>
        <h4>Goverment Page</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-boardered table-tsriped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($government as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->name}}</td>
                    <td>
                        <a href="{{ url('edit-government/'.$item->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <a href="{{ url('delete-government/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection