@extends('layouts.admin')
{{ $idt = Route::getFacadeRoot()->current()->parameters['idt']}}
{{ $id = Route::getFacadeRoot()->current()->parameters['id'] }}
@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="card">
        <div class="card-header">
            <h4>Ticket Price/Quantity</h4>
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        </div>
        <div class="card-body">
            <form action="{{url('insert/ticket/'.$idt.'/place/'.$id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3" id="places">
                        <select class="form-select" name="placeitem" aria-label="Default select example"
                            class="form-select">

                            <option value="{{ $places->id }}" disbled>{{ $places->name }}</option>

                        </select>
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
                                    <td><input type='text' name='name[]' class='form-control' value='{{$type->name}}' id='name' required></td>
                                    <td><input type='number' name='price[]' class='form-control' value=''  id='price' required></td>
                                    <td><input type='number' name='quantity[]' class='form-control' value='' id='quantity' required></td>

                                </tr>
                                @endforeach


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        /*  $(function() {
                types = {};
                $('#type').hide();
                $('#places').change(function() {
                    id = $('#place').find(":selected").val()
                    $.ajax({
                        url: "http://127.0.0.1:8000/typelist/8/" + id,
                        type: 'GET',
                        success: function(res) {
                            console.log(res);
                            types = res;



                        }
                    });

                    console.log(id)
                    console.log(places)
                    if ($('#places').val() != null) {


                        $('#type').show();
                        for (type in types) {
                        if (types.hasOwnProperty(type)) {
            $("#table>tbody").append(
                                "<tr><td><input type='text' name='name[]' class='form-control' value='' id='name' disabled></td>" +
                                "<td><input type='number' name='price[]' class='form-control' value='' id='price' ></td>" +
                                "<td><input type='number' name='quantity[]' class='form-control' value='' id='quantity' ></td></tr>"
                                                    );
                            }
                            }
                      
                    

                    }
                });

                $("#table>tbody").remove()
            });
    </script> 
@endsection
