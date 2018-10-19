@extends('adminlte::page')

@section('title', 'PBB Export')

@section('content_header')
    <h1>PBB Export Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- <div align="left">
                <a href="{{ route('exporttax.excel')}}" class="btn btn-success">Submit Export</a>
            </div> -->
            <br>
            
                <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>Type</th>
                        <th>Folder PBB</th>
                        <th>Luas Sertifikat</th>
                        <th>Wajib Pajak</th>
                        <th>NOP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>@foreach ($tax->certax as $cert)
                                    {{$cert->nama_sertifikat}}
                                @endforeach
                            </td>
                            <td>@foreach ($tax->certax as $ce)
                                    {{$ce->first()->type->short_name}}
                                @endforeach
                            </td>
                            <td>{{ $tax->folder_pbb }}</td>
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
  <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css')}}">
@stop

@section('js')

<script src="{{asset('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );

    </script>
@stop
