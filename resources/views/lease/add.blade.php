@extends('adminlte::page')

@section('title', 'Add Lease')

@section('content_header')
    <h1>Add Lease</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.forms.lease')
        </div>
    </div>
@stop

@section('css')
    <style>
        h4.box-title {
            display: block !important;
            background-color: #199056;
            padding: 10px;
            color: white;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            getCertSelectOptions();

            $('#multiple-certs').select2().change(function() {
                getCertResult();
            });
        });

        function getCertSelectOptions()
        {
            $.ajax({
                'method': 'GET',
                'url': '{{ url('/ajax/certificate') }}',
                'data': {
                    'act': 'select-options',
                },
                success: function(result) {
                    $('#multiple-certs').html(result);
                },
            });
        }

        function getCertResult()
        {
            $.ajax({
                'method': 'GET',
                'url': '{{ url('/ajax/certificate') }}',
                'data': {
                    'act': 'cert-result',
                    'ids': $('#multiple-certs').val().toString(),
                },
                success: function(result) {
                    $('#cert-result').fadeOut(100);
                    $('#cert-result').fadeIn(100).html(result);
                },
            });
        }
    </script>
@stop