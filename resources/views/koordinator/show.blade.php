@extends('adminlte::page')

@section('title', 'Properties')

@section('content_header')
    <h1>Property</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Property</h3>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>
                            <tr>
                                <td>Name : </td>
                                <td>{{ $property->name }}</td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td>{{ $property->address }}</td>
                            </tr>
                            <tr>
                                <td>Land Area :</td>
                                <td>{{ $property->land_area }}</td>
                            </tr>
                            <tr>
                                <td>Building Area :</td>
                                <td>{{ $property->building_area }}</td>
                            </tr>
                            <tr>
                                <td>Block :</td>
                                <td>{{ $property->block }}</td>
                            </tr>
                            <tr>
                                <td>Floor :</td>
                                <td>{{ $property->floor }}</td>
                            </tr>
                            <tr>
                                <td>Unit :</td>
                                <td>{{ $property->unit }}</td>
                            </tr>
                            <tr>
                                <td>Electricity :</td>
                                <td>{{ $property->electricity }}</td>
                            </tr>
                            <tr>
                                <td>Water :</td>
                                <td>{{ $property->water }}</td>
                            </tr>
                            <tr>
                                <td>Telephone :</td>
                                <td>{{ $property->telephone }}</td>
                            </tr>
                            @foreach ($property->getAttributes() as $index => $value)
                            <!--     <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $value }}</td>
                                </tr> -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        td {
            border-right: 1px solid #ded8cd;
        }
    </style>
@stop

@section('js')

@stop