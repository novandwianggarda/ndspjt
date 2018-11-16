@extends('adminlte::page')

@section('title', 'Certificate List')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Certificate</h3>
            
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No HM / HGB</th>
                            <th>Nama Sertifikat</th>
                            <th>Type</th>
                            <th>Kepemilikan</th>
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
                                <td>{{ $cert->certificate_type }}</td>
                                <td>{{ $cert->kepemilikan }}</td>
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
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

@stop

