@extends('layouts.admin')
@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="card">
        <div class="card-header">
            <h4>Type of Ticket</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-type/'.$places->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-5 col-sm-9">
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th><a  class="btn btn-info addRow">Add +</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="name[]" class="form-control" required></td>
                                <td><a class="btn btn-danger remove"> - </a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('.addRow').on('click', function(){
            addRow();
        });

        function addRow(){
            var tr = '<tr>'+
                    '<td><input type="text" name="name[]" class="form-control" required></td>'+
                    '<td><a  class="btn btn-danger remove"> - </a></td>'+
                    '</tr>';
            $('tbody').append(tr);
        };

        $('tbody').on('click','.remove', function(){
            $(this).parent().parent().remove();  
        });
        
    </script>

@endsection
