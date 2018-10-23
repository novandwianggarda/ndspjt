@extends('adminlte::page')

@section('title', 'DS Land-Lord')

@section('content_header')
		<center><h2>Lease List Import</h2></center>
@stop

@section('content')
<p align="right">
	<form action="/leases/storeimport/save" method="POST">
		@csrf
		<input type="hidden" name="data" value="{{ json_encode($data) }}">
		<input type="submit">
	</form>
	</p>
	<div class="row">
		<div class="col-md-12">
			<table id="tbl-leaseimport" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Tenant</th>
						<th>Keterangan</th>
						<th>Notaris</th>
						<th>No Akta Sewa</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->tenant}}</td> 
						<td>{{$d->note}}</td>
						<td>{{$d->lease_deed}}</td>
						<td>{{$d->lease_deed_number}}</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tbl-leaseimport').DataTable();
		});
	</script>
@stop
