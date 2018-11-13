@extends('adminlte::page')

@section('title', 'Certificate List')

@section('content_header')
    <h1>Certificate List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <!-- <table id="example1" class="table table-bordered table-striped" style="width: 100%;"> -->
        <div class="box">
        <div class="box-body table-responsive no-padding">
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>No HM / HGB</th>
                        <th>Type</th>
                        <th>Kota</th>
                        <th>Archive</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>

                        <th>Published Date</th>
                        <th>Expired Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $cert)
                        <tr>
                            <td>
                                <a href="/certificates/show/{{ $cert->id }}">{{ $cert->nama_sertifikat }}</a>
                            </td>
                            <td>{{ $cert->no_hm_hgb }}</td>
                            <td>{{ $cert->certificate_type }}</td>
                            <td>{{ $cert->kota }}</td>
                            <td>{{ $cert->archive }}</td>
                            <td>{{ $cert->kecamatan }}</td>
                            <td>{{ $cert->kelurahann }}</td>
                            <td>
                                <?php 
                                    if($cert->published_date==null){
                                        $publis='';
                                    }else{ 
                                        $tgl=strtotime($cert->expired_date);
                                        $publis=date("d F Y", $tgl);
                                    }
                                ?>
                                {{@$publis}}
                            </td>

                            <td>
                                <?php 
                                    if($cert->expired_date==null){
                                        $expired='';
                                    }else{ 
                                        $tgl=strtotime($cert->expired_date);
                                        $expired=date("d F Y", $tgl);
                                    }
                                ?>
                                {{@$expired}}
                            </td>
                            <td>
                                {!! Form::open(['method'=>'delete', 'route'=>['certificates.destroy', $cert->id], 'style' => 'display: inline-block;']) !!} 
                                {{ csrf_field() }}
                                <a href="/certificates/editcert/{{ $cert->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Certificates List ?")']) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@stop
