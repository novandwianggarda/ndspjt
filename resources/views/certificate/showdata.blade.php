@extends('adminlte::page')

@section('title', 'DS Land-Lord')

@section('content_header')
		<h1>List Certificate Import </h1>
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
						<th>No HM/HGB</th>
						<th>Purposes</th>
						<th>Kelurahann</th>
						<th>Kecamatan</th>
						<th>Kota</th>
						<th>Alamat</th>
						<th>Penanggung pbb</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $d)
					<tr>
						<td>{{$d->kepemilikan}}</td>
						<td>{{$d->nama_sertifikat}}</td>
						<td>{{$d->certificate_type}}</td>
						<td>{{$d->no_hm_hgb}}</td>
						<td>{{$d->purposes}}</td>
						<td>{{$d->kelurahann}}</td>
						<td>{{$d->kecamatan}}</td>
						<td>{{$d->kota}}</td>
						<td>{{$d->addrees}}</td> 
						<td>{{$d->penanggung_pbb}}</td>
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
            $('#tbl-certificates').DataTable();
        });
    </script>
@stop