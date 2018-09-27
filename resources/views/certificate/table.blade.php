@extends('adminlte::page')

@section('title', 'Certificate List')

@section('content_header')
    <h1>Certificate List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>No HM / HGB</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expired Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $cert)
                        <tr>
                            <td>
                                <a href="/certificates/show/{{ $cert->id }}">{{ $cert->kepemilikan }} - {{ $cert->nama_sertifikat }}</a>
                            </td>
                            <td>{{ $cert->no_hm_hgb }}</td>
                            <td>{{ $cert->certificate_type }}</td>
                            <td>{{ $cert->published_date }}</td>
                            <td>{{ $cert->expired_date }}</td>
                            <td>

                            <form class="delete" action="{{ url('/certificates/deletecert', $cert->id) }}" method="POST">

                                      {{ csrf_field() }}
                                <a href="/certificates/editcert/{{ $cert->id }}" class="btn btn-success btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>

                                      <input name="_method" type="hidden" value="DELETE">

                                      <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Delete</button>

                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Certificate</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expired Date</th>
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
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@stop
