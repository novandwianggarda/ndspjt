@extends('adminlte::page')

@section('title', 'Lease List')

@section('content_header')
    <h1>Lease List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-leases" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Prop. Name</th>
                        <th>Tenant</th>
                        <th>Length</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leases as $lease)
                        <tr>
                            <td>
                                <a href="/lease/{{ $lease->id }}">{{ $lease->prop_name }}</a>
                            </td>
                            <td>{{ $lease->tenant }}</td>
                            <td>{{ $lease->length }} Year</td>
                            <td>{{ $lease->start }}</td>
                            <td>{{ $lease->end }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Prop. Name</th>
                        <th>Tenant</th>
                        <th>Length</th>
                        <th>Start</th>
                        <th>End</th>
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
            $('#tbl-leases').DataTable();
        });
    </script>
@stop