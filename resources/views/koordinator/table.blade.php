@extends('adminlte::page')

@section('title', 'KPU - Jateng 1')

@section('content_header')
		<h1>Kordinator List</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Kab / Kota</th>
						<th>TPS</th>
						<th>Telp.</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($koordinators as $pend)
					<tr>
						<td>{{$pend->name}}</td>
						<td>{{$pend->address}}</td>
						<td>{{$pend->kabkot}}</td>
						<td>{{$pend->tps}}</td>
						<td>{{$pend->telephone}}</td>
						<td>
                            {!! Form::open(['method'=>'delete', 'route'=>['koord.destroy', $pend->id], 'style' => 'display: inline-block;']) !!} 
                            	{{ csrf_field() }}
                                <a href="/koordinator/edit/{{ $pend->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                  			{!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Koordinator ini ?")']) !!}

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
