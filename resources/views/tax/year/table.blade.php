@extends('adminlte::page')

@section('title', 'Year List')

@section('content_header')
    <h1>Year List</h1>
@stop

@section('content')
<a href="{{url('/taxes/tahunadd')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add New </a>
    <div class="row">
        <div class="col-md-12">
            <!-- <table id="tbl-taxes" class="table table-bordered" style="width:100%"> -->
            <div class="box">
            
                <div class="box-body table-responsive no-padding">
                
                    <table id="tbl-taxes" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NOP</th>
                                <th>Nama Sertifikat</th>
                                <th>Tahun</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($years as $year)
                                <tr>
                                    <td> {{$i++}}</td>
                                    
                                    <td>
                                        <a href="/taxes/showyear/{{ $year->id }}">
                                        {{ $year->taxye['nop'] }}</a>
                                    </td>
                                    <td>{{ $year->certye->nama_sertifikat }}</td>
                                    <td>{{ $year->year}}</td>


                                    <td>
                                        {!! Form::open(['method'=>'delete', 'route'=>['taxyears.destroy', $year->id], 'style' => 'display: inline-block;']) !!} 
                                        {{ csrf_field() }}

                                        {!! Form::button('<i class="fa fa-trash"></i>&nbsp;Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this Tax Year ?")']) !!}

                                        {!! Form::close() !!}
                                    </td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tbl-taxes').DataTable();
        });
    </script>
@stop
