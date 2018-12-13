@extends('adminlte::page')

{{-- <head>
    <style>
        button.active::after{
            font-family: FontAwesome;
            content: '\f00c';
            color: #a60099;
            float: right;
        }
    </style>
</head> --}}
<link rel="stylesheet" href="/css/certificatelist.css">

@section('title', 'Certificate List')

@section('content_header')
    <h1>&nbsp;</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <!-- <table id="tbl-taxes" class="table table-bordered" style="width:100%"> -->
            <div class="box">
                <p>&nbsp;</p>
                <center><img class="img img-responsive" src="{{asset('img/log1.jpg')}}" height="25%" width="20%" /></center>
                <h3 style="text-align: center;">Certificate List</h3>
                <table id="example" class="display responsive nowrap" style="width:100%">
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
                                            $tgl=strtotime($cert->published_date);
                                            $publis=date("d-m-Y", $tgl);
                                        }
                                    ?>
                                    {{@$publis }}
                                </td>

                                <td>
                                    <?php 
                                        if($cert->expired_date==null){
                                            $expired='';
                                        }else{ 
                                            $tgl=strtotime($cert->expired_date);
                                            $expired=date("d-m-Y", $tgl);
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
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@stop

@section('js')

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'colvis'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>


@stop
