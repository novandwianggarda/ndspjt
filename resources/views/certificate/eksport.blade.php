@extends('adminlte::page')

@section('title', 'Certificate Export')

@section('content_header')
    <h1>Certificate Export Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div align="left">
                <a href="{{ route('export.excel')}}" class="btn btn-success">Submit Export</a>
            </div>
            <br>
            
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>No HM / HGB</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expired Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $cert)
                        <tr>
                            <td>
                                <a href="/certificates/show/{{ $cert->id }}">{{ $cert->kepemilikan }} - {{ $cert->nama_sertifikat }}</a>
                            </td>
                            <td>{{ $cert->no_hm_hgb }}</td>
                            <td>{{ $cert->certificate_type }}</td>
                            <td>{{ $cert->published_date }}</td>
                            <td>{{ $cert->expired_date }}</td>
                            
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
