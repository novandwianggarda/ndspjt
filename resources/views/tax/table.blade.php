@extends('adminlte::page')

@section('title', 'Tax List')

@section('content_header')
    <h1>Tax List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-taxes" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>No HM / HGB</th>
                        <th>Jenis Sertifikat</th>
                        <th>Due Date</th>
                        <th>Payment PBB</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>
                                <a href="/taxes/show/{{ $tax->id }}">
                                    
                                    @foreach ($tax->certax as $b)
                                        {{$b->nama_sertifikat}}
                                    @endforeach
                                </a>
                            </td>
                            <td>
                                @foreach ($tax->certax as $b)
                                        {{$b->no_hm_hgb}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($tax->certax as $b)
                                        {{$b->type->short_name}}
                                @endforeach
                            </td>
                            <td>{{ $tax->due_date }}</td>
                            <td>{{ $tax->due_date_ly }}</td>
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
                <tfoot>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>No HM / HGB</th>
                        <th>Jenis Sertifikat</th>
                        <th>Due Date</th>
                        <th>Payment PBB</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
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
