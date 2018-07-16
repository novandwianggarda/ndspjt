@extends('adminlte::page')

@section('title', 'Tax List')

@section('content_header')
    <h1>Tax List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="tbl-taxes" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>NOP</th>
                        <th>Type</th>
                        <th>Holder</th>
                        <th>Corp Holder</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>
                                <a href="/tax/{{ $tax->id }}">{{ $tax->nop }}</a>
                            </td>
                            <td>{{ $tax->tax_type }}</td>
                            <td>{{ $tax->owner }}</td>
                            <td>{{ $tax->corp_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>NOP</th>
                        <th>Type</th>
                        <th>Holder</th>
                        <th>Corp Holder</th>
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