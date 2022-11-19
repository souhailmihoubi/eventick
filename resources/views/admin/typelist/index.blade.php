@extends('layouts.admin')
{{ $idt = Route::getFacadeRoot()->current()->parameters['id'] }}
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Place</h4>
        </div>
        <div class="card-body">
            <form action="" method="GET" enctype="multipart/form-data" id="form">
                @csrf
                <div class="form-group" id="place">
                    <div class="input-group">
                        <label for="name" class="col-sm6 col-form-label">Places</label>
                        <select class="form-select" name="place" id="place" onclick="getSelectedItem();">
                            <option value="" selected disabled>--- Select Place ---</option>
                            @foreach ($places as $place)
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#place").change(function() {
            var status = $('#place option:selected').val();
            $("#form").attr("action", {{$idt}}+"/place/" + status);
        });
    </script>
@endsection
