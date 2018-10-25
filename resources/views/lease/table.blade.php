@extends('adminlte::page')

@section('title', 'Lease List')

@section('content_header')
    <h1>Lease List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-leases" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Prop. Name</th>
                        <th>Tenant</th>
                        <th>Length</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leases as $lease)
                        <tr>
                            <td>
                                <a href="/lease/{{ $lease->id }}">{{ $lease->prop_name }}</a>
                            </td>
                            <td>{{ $lease->tenant }}</td>
                            <td>{{ $lease->duration }} Year</td>
                            <td>{{ $lease->start }}</td>
                            <td>{{ $lease->end }}</td>
                            <td>
                                {!! Form::open(['method'=>'delete', 'route'=>['lease.destroy', $lease->id], 'style' => 'display: inline-block;']) !!} 
                                {{ csrf_field() }}
                                <!-- <a href="/leases/edit/{{ $lease->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a> -->

                                {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Lease List ?")']) !!}

                                {!! Form::close() !!}
                            </td>
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
                        <th>Actions</th>
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
