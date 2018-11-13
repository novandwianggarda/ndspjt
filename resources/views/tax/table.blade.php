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
                                <th>NOP</th>
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
                                        {{ $tax->nop }}</a>
                                    </td>
                                    <td>
                                            
                                            @foreach ($tax->certax as $b)
                                                {{$b->nama_sertifikat}}
                                            @endforeach
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
                                    <td>{{ $tax->luas_tanah_pbb }}</td>
                                    <td>{{ $tax->luas_bangun_pbb }}</td>
                                    <td>{{ $tax->duedates }}</td>
                                    <td>
                                        <?php 
                                            if($tax->due_date_ly==null){
                                                $dately='';
                                            }else{ 
                                                $tgl=strtotime($tax->due_date_ly);
                                                $dately=date("d F Y", $tgl);
                                            }
                                        ?>
                                        {{@$dately}}
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'delete', 'route'=>['taxes.destroy', $tax->id], 'style' => 'display: inline-block;']) !!} 
                                        {{ csrf_field() }}
                                        <a href="/taxes/edit/{{ $tax->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                        {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this PBB List ?")']) !!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <!-- <tfoot>
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
                    </tfoot> -->
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
