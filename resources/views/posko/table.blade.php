@extends('adminlte::page')

@section('title', 'KPU - Jateng 1')

@section('content_header')
		<h1>Posko List</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="/posko/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add</a>
			<table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Lokasi</th>
						<th>Penanggung Jawab</th>
						<th>Jumlah DPT</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($poskos as $pend)
					<tr>
						<td>{{$pend->name}}</td>
						<td>{{$pend->lokasi}}</td>
						<td>{{$pend->penjwb}}</td>
						<td>{{$pend->jmlh_dpt}}</td>
						<td>
                            {!! Form::open(['method'=>'delete', 'route'=>['posk.destroy', $pend->id], 'style' => 'display: inline-block;']) !!} 
                            	{{ csrf_field() }}
                                <a href="/posko/edit/{{ $pend->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                  			{!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Posko ini ?")']) !!}

                  			{!! Form::close() !!}
                            </td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Nama</th>
						<th>Lokasi</th>
						<th>Penanggung Jawab</th>
						<th>Jumlah DPT</th>
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
