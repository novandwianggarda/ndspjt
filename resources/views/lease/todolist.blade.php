@extends('adminlte::page')

@section('title', 'To Do List')

@section('content_header')
    <h1>&nbsp;</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">

            	<p>&nbsp;</p>
                <center><img src="{{asset('img/log1.jpg')}}" height="25%" width="20%" /></center>
                <h2 style="text-align: center;">To Do List</h2>
                <div>
                	
                <p align="center">Tanggal Tagihan Lease</p>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Due Date</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($leasess as $lease)
                                <tr>

                                    <td>
                                        <a href="/leases/show/{{ $lease['id'] }}">{{ $lease['tenant'] }}</a>
                                    </td>
                                    <td>
                                        <?php 
                                            if($lease['due_date']==null){
                                                $due='';
                                            }else{ 
                                                $tgl=strtotime($lease['due_date']);
                                                $due=date("d-m-Y", $tgl);
                                            }
                                        ?>
                                        {{@$due }}
                                    </td>
                                    <td>
                                        Rp.{{ $lease['total'] }}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <br>
    


    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <p>&nbsp;</p>
                <center><img src="{{asset('img/log1.jpg')}}" height="25%" width="20%" /></center>
                <h2 style="text-align: center;">To Do List</h2>
                <div>
                    
                <p align="center">Tanggal Tagihan Lease yang sudah Terlewat</p>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Due Date</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($leaseyest as $lease)
                                <tr>
                                    <td>
                                        <a href="/leases/show/{{ $lease['id'] }}">{{ $lease['tenant'] }}</a>
                                    </td>
                                    <td>
                                        <?php 
                                            if($lease['due_date']==null){
                                                $due='';
                                            }else{ 
                                                $tgl=strtotime($lease['due_date']);
                                                $due=date("d-m-Y", $tgl);
                                            }
                                        ?>
                                        {{@$due }}
                                    </td>
                                    <td>Rp.
                                        <?php 
                                            $tot = $lease['total'];
                                            echo number_format($tot, 0, ".", ".")."<br />";
                                        ?>
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

    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
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
