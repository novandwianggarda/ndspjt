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
                                <!-- PROPERTY -->
                                @include('partials.forms.lease.property')
                                <!-- LEASE -->
                                @include('partials.forms.lease.lease')
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

        $(document).ready(function (){
            $('.datepicker').each(function() {
                $(this).datepicker('setDate', 'today');
            });
        });

        new Vue({
            el: '#form-lease',
            data: {
                grace_period: 0,
                fee_total: 0,
            },
            computed: {
                duration: function() {
                    return 1;
                },
            }
        });
    </script>
@stop
