@extends('adminlte::page')

@section('title', 'Certificate List')

@section('content_header')
    <h1>Certificate List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-certificates" class="table table-bordered dataTable" role="grid" style="width:100%">
                <thead>
                    <tr>
                        <th>Certificate</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expired Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $cert)
                        <tr>
                            <td>
                                <a href="/certificates/show/{{ $cert->id }}">{{ $cert->number }} - {{ $cert->name }}</a>
                            </td>
                            <td>{{ $cert->cert_type }}</td>
                            <td>{{ $cert->published_date }}</td>
                            <td>{{ $cert->expired_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Certificate</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expired Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tbl-certificates').DataTable();
        });
    </script>
@stop
