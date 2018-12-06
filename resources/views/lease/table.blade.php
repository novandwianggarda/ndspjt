@extends('adminlte::page')

@section('title', 'Lease List')

@section('content_header')
    <h1>&nbsp;</h1>
@stop

@section('content')
     <div class="row">
        <div class="col-md-12">
            <div class="box">
                <p>&nbsp;</p>
                <!-- <center><img src="{{asset('img/log1.jpg')}}" height="25%" width="20%" /></center> -->
                <center><img src="{{asset('img/log2.png')}}" width="10%" /></center>
                <h2 style="text-align: center;">Lease List</h2>
                <div class="box-body table-responsive no-padding">
                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Nama Lokasi</th>
                                <th>Jenis</th>
                                <th>Length</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leases as $lease)
                                <tr>
                                    @if($lease->status =='Belum')
                                        <td>
                                            <a href="/leases/show/{{ $lease->id }}">{{ $lease->tenant }}</a> 
                                                &nbsp;
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#myModal">{{ $lease->status }}</button>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Update Status Lease</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="radio" name="Belum" value="Milk">Belum &nbsp;<input type="radio" name="Acc" value="Acc">Acc 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                </div>

                                        </td>
                                        <td>{{ $lease->prop->name}}</td>
                                        <td>{{ $lease->prop->type->name}}</td>
                                        <td>{{ $lease->duration }} Year</td>
                                        <td>
                                            <?php 
                                                if($lease->start==null){
                                                    $starts='';
                                                }else{ 
                                                    $tgl=strtotime($lease->start);
                                                    $starts=date("d-m-Y", $tgl);
                                                }
                                            ?>
                                            {{@$starts }}
                                        </td>

                                        <td>
                                            <?php 
                                                if($lease->end==null){
                                                    $ends='';
                                                }else{ 
                                                    $tgl=strtotime($lease->end);
                                                    $ends=date("d-m-Y", $tgl);
                                                }
                                            ?>
                                            {{@$ends}}
                                        </td>

                                        <td>
                                            {!! Form::open(['method'=>'delete', 'route'=>['lease.destroy', $lease->id], 'style' => 'display: inline-block;']) !!} 
                                            {{ csrf_field() }}
                                            <a href="/leases/print/{{ $lease->id }}" class="btn btn-primary btn-xs"><i class="fa fa-print" aria-hidden="true"></i>Print</a>

                                            @can('userall', $lease)
                                            <a href="/leases/edit/{{ $lease->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>
                                            @endcan  

                                            {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Lease List ?")']) !!}
                                            {!! Form::close() !!}
                                        </td>

                                    @else($lease->status =='Acc')


                                        <td>
                                            <a href="/leases/show/{{ $lease->id }}">{{ $lease->tenant }}</a> &nbsp;


                                            <button type="button" class="badge badge-info" data-toggle="modal" data-target="#myModal">{{ $lease->status }}</button>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Update Status Lease</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="radio" name="Belum" value="Milk">Belum &nbsp;<input type="radio" name="Acc" value="Acc">Acc 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                </div>


                                        </td>
                                        <td>{{ $lease->prop->name}}</td>
                                        <td>{{ $lease->prop->type->name}}</td>
                                        <td>{{ $lease->duration }} Year</td>
                                        <td>
                                            <?php 
                                                if($lease->start==null){
                                                    $starts='';
                                                }else{ 
                                                    $tgl=strtotime($lease->start);
                                                    $starts=date("d-m-Y", $tgl);
                                                }
                                            ?>
                                            {{@$starts }}
                                        </td>

                                        <td>
                                            <?php 
                                                if($lease->end==null){
                                                    $ends='';
                                                }else{ 
                                                    $tgl=strtotime($lease->end);
                                                    $ends=date("d-m-Y", $tgl);
                                                }
                                            ?>
                                            {{@$ends}}
                                        </td>

                                        <td>
                                            {!! Form::open(['method'=>'delete', 'route'=>['lease.destroy', $lease->id], 'style' => 'display: inline-block;']) !!} 
                                                {{ csrf_field() }}
                                                <a href="/leases/print/{{ $lease->id }}" class="btn btn-primary btn-xs"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                                            
                                            @can('userman', $lease)
                                                <a href="/leases/edit/{{ $lease->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>
                                            @endcan  

                                            {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Lease List ?")']) !!}
                                            {!! Form::close() !!}
                                        </td>        
                                    @endif
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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>


@stop
