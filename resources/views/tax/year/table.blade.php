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
                            @foreach ($years as $tax)
                                <tr>
                                    <td> {{$i++}}</td>
                                    
                                    <td>{{ $tax->taxye['nop'] }}</td>
                                    <td>{{ $tax->certye->nama_sertifikat }}</td>
                                    <td>{{ $tax->year}}</td>
                                    <td>

                                    <form class="delete" action="{{ url('/taxes/delete', $tax->id) }}" method="POST">

                                              {{ csrf_field() }}
                                        <a href="/taxes/edit/{{ $tax->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                              <input name="_method" type="hidden" value="DELETE">

                                              <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Delete</button>


                                               
                                              
                                    </form>

                                                

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
