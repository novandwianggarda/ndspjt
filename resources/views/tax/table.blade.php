@extends('adminlte::page')

@section('title', 'Tax List')

@section('content_header')
    <h1>Tax List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- <table id="tbl-taxes" class="table table-bordered" style="width:100%"> -->
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table id="tbl-taxes" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sertifikat</th>
                                <th>Folder PBB</th>
                                <th>No HM / HGB</th>
                                <th>Rencana Group</th>
                                <th>Luas Sertifikat</th>
                                <th>Wajib Pajak</th>
                                <th>Jenis Sertifikat</th>
                                <th>Letak Objek Pajak</th>
                                <th>Kelurahan PBB</th>
                                <th>Kota PBB</th>
                                <th>Penanggung PBB</th>
                                <th>NOP</th>
                                <th>Luas Tanah PBB</th>
                                <th>Luas Bangun PBB</th>
                                <th>Due Date</th>
                                <th>Payment PBB</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taxes as $tax)
                                <tr>
                                    <td> {{$i++}}</td>
                                    <td>
                                        <a href="/taxes/show/{{ $tax->id }}">
                                            
                                            @foreach ($tax->certax as $b)
                                                {{$b->nama_sertifikat}}
                                            @endforeach
                                        </a>
                                    </td>
                                    <td>{{ $tax->folder_pbb }}</td>

                                    <td>
                                        @foreach ($tax->certax as $b)
                                                {{$b->no_hm_hgb}}
                                        @endforeach
                                    </td>
                                    <td>{{ $tax->rencana_group }}</td>
                                    <td>{{ $tax->luas_sertifikat }}</td>
                                    <td>{{ $tax->wajib_pajak }}</td>
                                    <td>
                                        @foreach ($tax->certax as $b)
                                                {{$b->type->short_name}}
                                        @endforeach
                                    </td>
                                    <td>{{ $tax->letak_objek_pajak }}</td>
                                    <td>{{ $tax->kelurahan_pbb }}</td>
                                    <td>{{ $tax->kota_pbb }}</td>
                                    <td>{{ $tax->pen_pbb }}</td>
                                    <td>{{ $tax->nop }}</td>
                                    <td>{{ $tax->luas_tanah_pbb }}</td>
                                    <td>{{ $tax->luas_bangun_pbb }}</td>
                                    <td>{{ $tax->due_date }}</td>
                                    <td>{{ $tax->due_date_ly }}</td>
                                    <td>

                                    <form class="delete" action="{{ url('/taxes/delete', $tax->id) }}" method="POST">

                                              {{ csrf_field() }}
                                        <a href="/taxes/edit/{{ $tax->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                              <input name="_method" type="hidden" value="DELETE">

                                              <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Delete</button>


                                               
                                              
                                    </form>

                                                

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Sertifikat</th>
                            <th>Folder PBB</th>
                            <th>No HM / HGB</th>
                            <th>Rencana Group</th>
                            <th>Luas Sertifikat</th>
                            <th>Wajib Pajak</th>
                            <th>Jenis Sertifikat</th>
                            <th>Letak Objek Pajak</th>
                            <th>Kelurahan PBB</th>
                            <th>Kota PBB</th>
                            <th>Penanggung PBB</th>
                            <th>NOP</th>
                            <th>Luas Tanah PBB</th>
                            <th>Luas Bangun PBB</th>
                            <th>Due Date</th>
                            <th>Payment PBB</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
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
