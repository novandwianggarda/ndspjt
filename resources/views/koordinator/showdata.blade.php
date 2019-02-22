@extends('adminlte::page')
@section('title', 'KPU - Jateng 1')
@section('content_header')
		<h1>Penduduk Import List</h1>
@stop

@section('content')
<p align="right">
	<form action="/penduduk/storeimport/save" method="POST">
		@csrf
		<input type="hidden" name="data" value="{{ json_encode($data) }}">
		<input type="submit">
	</form>
	</p>
	<div class="row">
		<div class="col-md-12">
			<table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>No KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->nokk}}</td>
						<td>{{$d->nik}}</td>
						<td>{{$d->nama}}</td>
						<td>{{$d->ttl}}</td>
						<td>{{$d->statusper}}</td>
					</tr>
					@endforeach
				</tbody>
				<!-- <tfoot>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Land Area</th>
						<th>Building Area</th>
						<th>Block</th>
						<th>Floor</th>
						<th>Unit</th>
						<th>Electricity</th>
						<th>Water</th>
						<th>Telephone</th>
					</tr>
				</tfoot> -->
			</table>
		</div>
	</div>
	
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tbl-properties').DataTable();
		});
	</script>
@stop
