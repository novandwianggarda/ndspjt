@extends('adminlte::page')

@section('title', 'Penduduk List')

@section('content_header')
		<h1>Penduduk List</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="/penduduk/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add</a>
			<a href="/penduduk/import" class="btn btn-default"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Import</a>

			<table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>No KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($penduduks as $pend)
					<tr>
						<td>{{$pend->nokk}}</td>
						<td>{{$pend->nik}}</td>
						<td>{{$pend->nama}}</td>
						<td>{{$pend->ttl}}</td>
						<td>{{$pend->statusper}}</td>
						<td>
                            {!! Form::open(['method'=>'delete', 'route'=>['pend.destroy', $pend->id], 'style' => 'display: inline-block;']) !!} 
                            	{{ csrf_field() }}
                                <a href="/penduduk/edit/{{ $pend->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                  			{!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this pend List ?")']) !!}

                  			{!! Form::close() !!}
                            </td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</tfoot>
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
