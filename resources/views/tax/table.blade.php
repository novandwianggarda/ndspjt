@extends('adminlte::page')

@section('title', 'Tax List')

@section('content_header')
    <h1>Tax List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-taxes" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>Jenis Sertifikat</th>
                        <th>Due Date</th>
                        <th>Payment PBB</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>
                                <a href="/taxes/show/{{ $tax->id }}">{{ $tax->certif->nama_sertifikat }}</a>
                            </td>
                            <td>{{ $tax->certif->type->short_name }}</td>
                            <td>{{ $tax->due_date }}</td>
                            <td>{{ $tax->due_date_ly }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>Jenis Sertifikat</th>
                        <th>Due Date</th>
                        <th>Payment PBB</th>
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
            $('#tbl-taxes').DataTable();
        });
    </script>
@stop
