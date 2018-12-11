@extends('adminlte::page')

@section('title', 'DS-Land  Lord')

@section('content')

	<section class="content-header">
      <h1>
        Invoice
        <small>{{ $lease->tenant }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="{{asset('img/log1.jpg')}}" height="25%" width="20%" />
            <small class="pull-right">Date: {{$now}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Yang Menyewakan
          <address>
            <strong>{{$lease->lessor}}</strong><br>
            Alamat : {{ $lease->cert->addrees }}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Property
          <address>
            <strong>{{ $lease->prop->name }}</strong><br>
            {{ $lease->prop->address }}<br>
            Land Area : {{ $lease->prop->land_area }}&nbsp;m<sup>2</sup><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice <br>An. {{ $lease->tenant }}</b><br>
          
          <b>Order ID:</b>{{$lease->id}}<br>

          <b>Payment Due:</b>

            @foreach($payterm as $mydata)
              <?php 
                if($mydata->due_date==null){
                  $paid='';
                }else{ 
                  $tgl=strtotime($mydata->due_date);
                  $paid=date("d F Y", $tgl);
                }
              ?>

              {{@$paid }}
            @endforeach

          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Due Date</th>
              <th>Description</th>
              <th>Total Sewa </th>
            
            </tr>
            </thead>
            <tbody>
      
              <?php  
                $rent_price='';
                $rentprice='';
              ?>
            @foreach($payterm as $a)
              

              <?php 
                $rentprice = $lease->rent_price;
                $rent_price = $lease->rent_price * 0.1;
              ?>

                <tr>
                  <td width="20%">
                    <?php 
                      if($a->due_date==null){
                        $tang='';
                      }else{ 
                        $tgl=strtotime($a->due_date);
                        $tang=date("d F Y", $tgl);
                      }
                    ?>
              
                    {{@$tang }}

                  </td>
                  <td width="60%">{{ $a->note}}</td>
                  <td width="20%">Rp. {{ $a->total }}</td>
                </tr>
            @endforeach


            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="{{asset('img/credit/bca.png')}}" alt="BCA">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Email : lease@dse.id <br>
            No Hp : 087777887888 <br>
            Alamat : Jl. K.H Agus Salim no 7 Smg
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due </p>


          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Sewa</th>
                <td><?php 
                  echo"Rp. $rentprice";
                  ?></td>
              </tr>
              <tr>
                <th style="width:50%">PPN:</th>
                <td><?php 
                  echo"Rp. $rent_price";
                  ?>
                </td>
              </tr>
              <tr>
                <th>Total Sewa + PPN:</th>
                <td>Rp. {{ $rentprice + $rent_price}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button onclick="myFunction()"><i class="fa fa-print"></i>Print </button>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
@stop

@section('js')
<script>
function myFunction() {
    window.print();
}
</script>
@stop