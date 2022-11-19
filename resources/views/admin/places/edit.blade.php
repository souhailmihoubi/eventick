@extends('layouts.admin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <div class="card">
        <div class="card-header">
            <h4>Edit Place</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-places/'.$places->id) }}" method="POST" >
                
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{$places->government->name}}</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$places->name}}" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Nombre de places Maximale</label>
                        <input type="number" class="form-control" name="nbMax" value="{{$places->nbMax}}" required>
                    </div>

                    
                        <div class="col-md-4 col-sm-4">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th><a  class="btn btn-info addRow">Add +</a></th>
                                </thead>
                               
                                <tbody>
                                    @foreach ($types as $type)
                                    <tr>
                                        <td><input type="text" name="namet[]" class="form-control" value="{{$type->name}}"></td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                                
                            </table>
                        </div>
                    
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
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
            var tr ='<tr>'+
                    '<td><input type="text" name="namet[]" class="form-control" ></td>'+    
                    '</tr>';
                    
            $('tbody').append(tr);
        };

        $('tbody').on('click','.remove', function(){
            $(this).parent().parent().remove();  
        });
        
    </script> 
@endsection
