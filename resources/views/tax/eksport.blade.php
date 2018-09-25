@extends('adminlte::page')

@section('title', 'PBB Export')

@section('content_header')
    <h1>PBB Export Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div align="left">
                <a href="{{ route('exporttax.excel')}}" class="btn btn-success">Submit Export</a>
            </div>
            <br>
            
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Folder PBB</th>
                        <th>Rencana Group</th>
                        <th>Luas Sertifikat</th>
                        <th>Wajib Pajak</th>
                        <th>NOP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>{{ $tax->folder_pbb }}</td>
                            <td>{{ $tax->rencana_group }}</td>
                            <td>{{ $tax->luas_sertifikat }}</td>
                            <td>{{ $tax->wajib_pajak }}</td>
                            <td>{{ $tax->nop }}</td>
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
