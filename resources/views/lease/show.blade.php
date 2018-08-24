@extends('adminlte::page')

@section('title', 'Lease')

@section('content_header')
    <h1>Lease</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Lease</h3>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>
                            @foreach ($lease->getAttributes() as $index => $value)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
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