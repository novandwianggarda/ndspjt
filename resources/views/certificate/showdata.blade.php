@extends('adminlte::page')

@section('title', 'Certificate List')

@section('content_header')
		<h1>Certificate Import List</h1>
@stop

@section('content')
<p align="right">
	<form action="/certificates/storeimport/save" method="POST">
		@csrf
		<input type="hidden" name="data" value="{{ json_encode($data) }}">
		<input type="submit">
	</form>
	</p>
	<div class="row">
            <div class="col-md-12">
            <table id="tbl-certificates" class="table table-bordered dataTable" role="grid" style="width:100%">
				<thead>
					<tr>
						<th>Kepemilikan</th>
						<th>Nama Sertifikat</th>
						<th>Jenis Sert</th>
						<th>Archive</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>Kota</th>
						<th>Alamat</th>
						<th>Purpose</th>
						<th>Penanggung pbb</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->kepemilikan}}</td>
						<td>{{$d->nama_sertifikat}}</td>
						<td>{{$d->certificate_type}}</td>
						<td>{{$d->archive}}</td>
						<td>{{$d->kelurahan}}</td>
						<td>{{$d->kecamatan}}</td>
						<td>{{$d->kota}}</td>
						<td>{{$d->addrees}}</td> 
						<td>{{$d->purposes}}</td>
						<td>{{$d->penanggung_pbb}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- <table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Kepemilikan</th>
						<th>NOP</th>
						<th>Nama Sertifikat</th>
						<th>Published Date</th>
						<th>Expired Date</th>
						<th>Address City</th>
						<th>Address District</th>
						<th>Addres Village</th>
						<th>Addres</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->kepemilikan}}</td>
						<td>{{$d->nop}}</td>
						<td>{{$d->owner}}</td>
						<td>{{$d->published_date}}</td>
						<td>{{$d->expired_date}}</td>
						<td>{{$d->addr_city}}</td>
						<td>{{$d->addr_district}}</td>
						<td>{{$d->addr_village}}</td>
						<td>{{$d->addr_address}}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
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
				</tfoot>
			</table> -->
		</div>
	</div>
	
@stop


@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tbl-certificates').DataTable();
        });
    </script>
@stop