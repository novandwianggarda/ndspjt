@extends('adminlte::page')

@section('title', 'leases Export')

@section('content_header')
    <h1>leases Export Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div align="left">
                <a href="{{ route('exportlease.excel')}}" class="btn btn-success">Submit Export</a>
            </div>
            <br>
            
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Lessor</th>
                        <th>Lessor PKP</th>
                        <th>Tenan</th>
                        <th>Purpose</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leases as $leas)
                        <tr>
                            <td>{{ $leas->lessor }}</td>
                            <td>{{ $leas->lessor_pkp }}</td>
                            <td>{{ $leas->tenant }}</td>
                            <td>{{ $leas->purpose }}</td>
                            <td>{{ $leas->start }}</td>
                            <td>{{ $leas->end }}</td>
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
