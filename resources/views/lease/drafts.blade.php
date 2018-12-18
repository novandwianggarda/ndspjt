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
@section('title', 'Drafts')

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
                <h2 style="text-align: center;">Drafts</h2>
                <div class="box-body table-responsive no-padding">
                    
                    <table id="example" class="display responsive nowrap" style="width:100%">

                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Status</th>
                                <th>Nama Lokasi</th>
                                <th>Type</th>
                                <th>Payment Term</th>
                                <th>Payment History</th>
                                <th>Tagihan Lainya</th>
                                <th>Masa Sewa</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leasess as $lease)
                                @if($lease->status =='')
                                <tr>
                                        <td>
                                            <a href="/leases/show/{{ $lease->id }}">{{ $lease->tenant }}</a> 
                                        </td>
                                        <td>
                                            @can('userman', $lease)
                                                <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#editModal-{{ $lease->id }}">{{ $lease->status }}</button>
                                                <div class="modal fade" id="editModal-{{ $lease->id }}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog">
                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              <h4 class="modal-title">Update Status Lease</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('updatemodal')}}" id="editModal">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $lease->id}}">
                                                                    <input type="radio" name="status" value="Acc">&nbsp;Acc
                                                                    <br>

                                                                    <div align="right">
                                                                    <button type="submit" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                                                                        <i class="fa fa-plus"></i>
                                                                        Update
                                                                    </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                          </div>
                                                        </div>
                                                </div>
                                            @endcan   
                                        </td>
                                        <td>{{ $lease->prop->name}}</td>
                                        <td>{{ $lease->prop->type->name}}</td>

                                        <?php 
                                            $payterm = json_encode($lease->payment_terms);
                                            $payment_terms = json_decode($payterm);
                                        ?>
                                        <td>
                                             @foreach($payment_terms as $mydata => $value)
                                                Pembayaran  &nbsp; :&nbsp;Rp.
                                                    <?php 
                                                        $tagihan = $value->total;
                                                        echo number_format((float)$tagihan, 0, ".", ".")."<br />";
                                                    ?>
                                                <br>
                                                Due Date  &nbsp; :
                                                    <?php 
                                                        if($value->due_date==null){
                                                            $tang='';
                                                        }else{ 
                                                            $tgl=strtotime($value->due_date);
                                                            $tang=date("d F Y", $tgl);
                                                        }
                                                    ?>
                                                    {{@$tang}}
                                                <br>
                                            @endforeach
                                        </td>



                                        <?php 
                                            $payhis = json_encode($lease->payment_history);
                                            $paymenthist = json_decode($payhis);
                                        ?>
                                        <td>
                                             @foreach($paymenthist as $mydata => $value)
                                                Pembayaran  &nbsp; :&nbsp;Rp.
                                                    <?php 
                                                        $tagihan = $value->total;
                                                        echo number_format((float)$tagihan, 0, ".", ".")."<br />";
                                                    ?>
                                                <br>
                                                Paid Date  &nbsp; :
                                                    <?php 
                                                        if($value->paid_date==null){
                                                            $tang='';
                                                        }else{ 
                                                            $tgl=strtotime($value->paid_date);
                                                            $tang=date("d F Y", $tgl);
                                                        }
                                                    ?>
                                                    {{@$tang}}
                                                <br>
                                            @endforeach
                                        </td>




                                        <?php 
                                            $payinvo = json_encode($lease->payment_invoices);
                                            $payinv = json_decode($payinvo);
                                        ?>
                                        <td>
                                             @foreach($payinv as $mydata => $value)
                                                Pembayaran  &nbsp; :&nbsp;Rp.
                                                    <?php 
                                                        $tagihan = $value->total;
                                                        echo number_format((float)$tagihan, 0, ".", ".")."<br />";
                                                    ?>
                                                <br>
                                                Paid Date  &nbsp; :
                                                    <?php 
                                                        if($value->paid_date==null){
                                                            $tang='';
                                                        }else{ 
                                                            $tgl=strtotime($value->paid_date);
                                                            $tang=date("d F Y", $tgl);
                                                        }
                                                    ?>
                                                    {{@$tang}}
                                                <br>
                                            @endforeach
                                        </td>

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
                                @endif

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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>


@stop
