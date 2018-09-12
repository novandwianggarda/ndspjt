@extends('adminlte::page')

@section('title', 'Property List')

@section('content_header')
		<h1>Property Import List</h1>
@stop

@section('content')
<p align="right">
	<form action="/properties/storeimport/save" method="POST">
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
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->name}}</td>
						<td>{{$d->address}}</td>
						<td>{{$d->land_area}}</td>
						<td>{{$d->building_area}}</td>
						<td>{{$d->block}}</td>
						<td>{{$d->floor}}</td>
						<td>{{$d->unit}}</td>
						<td>{{$d->electricity}}</td>
						<td>{{$d->water}}</td>
						<td>{{$d->telephone}}</td>
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
