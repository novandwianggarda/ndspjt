@extends('adminlte::page')

@section('title', 'Add Lease')

@section('content_header')
    <h1>Add Lease</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <form class="form-horizontal" id="form-lease">
                        <div class="box-group" id="accordion">
                            <div class="panel box box-success">
                                <!-- LAND -->
                                @include('partials.forms.lease.land')
                                <!-- LEASE -->
                                @include('partials.forms.lease.lease')
                                <!-- PROPERTY -->
                                @include('partials.forms.lease.property')
                                <!-- PRICE -->
                                @include('partials.forms.lease.price')
                                <!-- BROKER -->
                                @include('partials.forms.lease.broker')
                                <!-- GRACE -->
                                @include('partials.forms.lease.grace')
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>

        const form = new Vue({
            'el': '#form-lease',
            'data': {
                'select_certificates': '',
                'select_lease_types': '',
                'lease_duration': 0,
            },
            methods: {
                fetchLeaseTypes() {
                    Axios.get('/api/lease_types').then(res => console.log(res.data));
                },
            },
            mounted() {
                this.fetchLeaseTypes();
            },
        });


        $(document).ready(function() {
            getCertSelectOptions();
            getLeaseTypeOptions();

            $('#multiple-certs').select2().change(function() {
                getCertResult();
            });
            $('.datepicker').each(function() {
                $(this).datepicker();
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

        function getLeaseTypeOptions()
        {
            $.ajax({
                'method': 'GET',
                'url': '{{ url('/ajax/lease') }}',
                'data': {
                    'act': 'select-lease-types',
                },
                success: function(result) {
                    $('#lease-types').html(result);
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
                    $('#cert-result').fadeOut(500);
                    $('#cert-result').fadeIn(500).html(result);
                },
            });
        }
    </script>
@stop
