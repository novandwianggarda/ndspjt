@extends('adminlte::page')

@section('title', 'Certificate List')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Certificate</h3>
            
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No HM / HGB</th>
                            <th>Nama Sertifikat</th>
                            <th>Kepemilikan</th>
                            <th>Type</th>
                            <th>Publish Date</th>
                            <th>Expired Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no_hm_hgb_arr = [];?>

                        @foreach ($certificates as $cert)
                            <?php $no_hm_hgb_arr[] = $cert->no_hm_hgb;?>
                            <?php 
                                if(in_array($cert->no_hm_hgb, $no_hm_hgb_arr)&&count(array_keys($no_hm_hgb_arr, $cert->no_hm_hgb)) ==1) : 
                            ?>
                            <tr>
                                <td>
                                    <a href="/certificates/shows/?no_hm_hgb={{ $cert->no_hm_hgb }}">{{ $cert->no_hm_hgb }}</a>
                                </td>
                                <td>{{ $cert->nama_sertifikat }}
                                </td>
                                <td>{{ $cert->kepemilikan }}</td>
                                <td>{{ $cert->certificate_type }}</td>
                                <td>{{ $cert->published_date }}</td>
                                <td>{{ $cert->expired_date }}</td>
                            </tr>
                        <?php endif;?>
                        @endforeach
                    </tbody>
                </table>
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
