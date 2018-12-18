@extends('adminlte::page')

<style>
    .box, #example_wrapper{
        min-height: 500px;
    }
    button.active::after{
        font-family: FontAwesome;
        content: '\f00c';
        color: #a60099;
        float: right;
    }
</style>

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
                <!-- <center><img src="{{asset('img/log2.png')}}" width="10%" /></center> -->
                <h2 style="text-align: center;">Lease List</h2>
                <div class="box-body table-responsive no-padding">
                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Nama Lokasi</th>
                                <th>Type</th>
                                <th>Masa Sewa</th>
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
            // if ($("button").hasClass("active")) {
            //     $(".active").css("background","red");
            // }
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
        $('.editModalBtn').click(function() {
          var id=$(this).data('id');
          var action ='{{URL::to('updatemodal')}}/'+id;


          var url = '{{URL::to('updatemodal')}}';
          $.ajax({
            type : 'post',
            url  : url,
            data : {'id':id},
            success:function(data){
              $('#id').val(data.id);
              $('.status').val(data.status);
              $('.classFormUpdate').attr('action',action);
              $('#editModal').modal('show');
            }
          });
        });
    });
    </script>

    <!-- <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id  =  button.data('id')
            var status = button.data('status')
            var modal = $(this)

            modal.find('.modal-body #leaseid').val(id);
            modal.find('.modal-body #stat').val(status);
        })

    </script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>


@stop
