@extends('adminlte::page')

@section('title', 'Property Export')

@section('content_header')
    <h1>Property Export Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div align="left">
                <a href="{{ route('exportprop.excel')}}" class="btn btn-success">Submit Export</a>
            </div>
            <br>
            
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type Property</th>
                        <th>Address</th>
                        <th>Land Area</th>
                        <th>Building Area</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($prop as $property)
                    <tr>
                        <td>{{$property->name}}</td>
                        <td>{{$property->type->name}}</td>
                        <td>{{$property->address}}</td>
                        <td>{{$property->land_area}}</td>
                        <td>{{$property->building_area}}</td>
                    </tr>
                    @endforeach
                </tbody>
               
            </table>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

    <script>
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@stop
