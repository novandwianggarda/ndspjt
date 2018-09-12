@extends('adminlte::page')

@section('title', 'Taxs List')

@section('content_header')
		<h1>Taxs Import List</h1>
@stop

@section('content')
<p align="right">
	<form action="/taxes/storeimport/save" method="POST">
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
						<th>Certificate Ids</th>
						<th>NOP</th>
						<th>Owner</th>
						<th>Year</th>
						<th>Due Date</th>
						<th>Nominal ly</th>
						<th>Addres Village</th>
						<th>Addr Land Area</th>
						<th>Addres Building Area </th>
						<th>NJOP Land</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->certificate_ids}}</td>
						<td>{{$d->nop}}</td>
						<td>{{$d->owner}}</td>
						<td>{{$d->year}}</td>
						<td>{{$d->due_date}}</td>
						<td>{{$d->nominal_ly}}</td>
						<td>{{$d->addr_village}}</td>
						<td>{{$d->addr_land_area}}</td>
						<td>{{$d->addr_building_area}}</td>
						<td>{{$d->njop_land}}</td>
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
