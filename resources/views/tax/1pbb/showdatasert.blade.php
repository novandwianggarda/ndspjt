@extends('adminlte::page')

@section('title', 'DS Land-Lord')

@section('content_header')
		<center><h2>1 PBB banyak sertifikat </h2></center>
@stop

@section('content')
<p align="right">
	<form action="/taxes/storeimportsert/save" method="POST">
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
						<th>NOP</th>
						<th>Penanggung PBB</th>
						<th>Wajib Pajak</th>
						<th>Letak objek Pajak</th>
						<th>Due Date</th>
						<th>NJOP Land</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->nop}}</td>
						<td>{{$d->pen_pbb}}</td>
						<td>{{$d->wajib_pajak}}</td>  
						<td>{{$d->letak_objek_pajak}}</td>
						<td>{{$d->duedates}}</td>
						<td>{{$d->njop_land}}</td>
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
			$('#tbl-properties').DataTable();
		});
	</script>
@stop
