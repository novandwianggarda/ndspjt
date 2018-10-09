@extends('adminlte::page')

@section('title', 'Property List')

@section('content_header')
		<h1>Property List</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table id="tbl-properties" class="table table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Type Property</th>
						<th>Address</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					@foreach ($properties as $property)
					<tr>
						<td>
						<a href="show/{{ $property->id}}">{{$property->name}}</a>	
						</td>

						<td>{{$property->type->name}}</td>
						<td>{{$property->address}}</td>
						<td>
                            {!! Form::open(['method'=>'delete', 'route'=>['property.destroy', $property->id], 'style' => 'display: inline-block;']) !!} 
                            	{{ csrf_field() }}
                                <a href="/properties/editprop/{{ $property->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                  			{!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Property List ?")']) !!}

                  			{!! Form::close() !!}
                            </td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Type Property</th>
						<th>Address</th>
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
