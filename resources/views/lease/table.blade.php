@extends('adminlte::page')

@section('title', 'Lease List')

@section('content_header')
    <h1>Lease List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div>
            Hide / Show | <a class="toggle-vis" data-column="0">Tenant</a> | <a class="toggle-vis" data-column="1">Nama Lokasi</a> | <a class="toggle-vis" data-column="2">Jenis</a> | <a class="toggle-vis" data-column="3">Lenght</a> | <a class="toggle-vis" data-column="4">Start</a> | <a class="toggle-vis" data-column="5">End</a> |
        </div>

            <table id="tbl-leases" class="table table-bordered" style="width:100%">
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
                            <td>
                                <a href="/leases/show/{{ $lease->id }}">{{ $lease->tenant }}</a>
                            </td>
                            <td>{{ $lease->prop->name}}</td>
                            <td>{{ $lease->prop->type->name_prop}}</td>
                            <td>{{ $lease->duration }} Year</td>
                            
                            <td>
                                <?php 
                                    if($lease->start==null){
                                        $starts='';
                                    }else{ 
                                        $tgl=strtotime($lease->start);
                                        $starts=date("d F Y", $tgl);
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
                                        $ends=date("d F Y", $tgl);
                                    }
                                ?>
                                {{@$ends}}
                            </td>
                            <td>
                                {!! Form::open(['method'=>'delete', 'route'=>['lease.destroy', $lease->id], 'style' => 'display: inline-block;']) !!} 
                                {{ csrf_field() }}
                                <a href="/leases/print/{{ $lease->id }}" class="btn btn-info btn-xs"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                                <a href="/leases/edit/{{ $lease->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Lease List ?")']) !!}

                                {!! Form::close() !!}
                            </td>
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
        $(document).ready(function() {
            
            var table = $('#tbl-leases').DataTable();
         
            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
         
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
         
                // Toggle the visibility
                column.visible( ! column.visible() );
            });
        });
    </script>
@stop
