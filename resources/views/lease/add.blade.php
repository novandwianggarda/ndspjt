@extends('adminlte::page')

@section('title', 'Add Lease')

@section('content_header')
    <h1>{{ trans('lease.m_add_lease') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <!--ERRORS-->
                    @include('partials.errors')
                    <form class="form-horizontal" id="form-lease" action="/leases/add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- LAND -->
                                @include('partials.forms.lease.land')
                                <!-- PROPERTY -->
                                @include('partials.forms.lease.property')
                                <!-- LEASE -->
                                @include('partials.forms.lease.lease')
                                <!-- SUBMIT BTN -->
                                <div class="form-group" style="margin-top:15px;">
                                    <div class="col-sm-12" style="padding:0px 25px">
                                        <button type="submit" class="btn form-control ll-bgcolor ll-white">
                                            <i class="fa fa-plus"></i>
                                            Add
                                        </button>
                                    </div>
                                </div>
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

        var form = $('#form-lease');
        var oldBrokFeeYearly = "{{ old('brok_fee_yearly') }}" == '' ? 0 : parseInt(oldBrokFeeYearly);
        var oldPeriodType = "{{ old('period_type') }}" == '' ? 'yearly' : oldPeriodType;

        var fvue = new Vue({
            el: '#form-lease',
            data: {
                start: "{{ old('start') }}",
                end: "{{ old('end') }}",
                graceStart: "{{ old('grace_start') }}",
                graceEnd: "{{ old('grace_end') }}",
                feeTotal: 0,
                brokFeeYearly: oldBrokFeeYearly,
                periodType: oldPeriodType,
                includePPN: false,
                includePPH: false,
                ppnTotal: 0,
                pphTotal: 0,
            },
            computed: {
                gracePeriod: function() {
                    return diffTwoDates(this.graceStart, this.graceEnd, 'monthly');
                },
                duration: function() {
                    return diffTwoDates(this.start, this.end, this.periodType);
                },
                brokFeeTotal: function() {
                    return this.brokFeeYearly * this.duration;
                },
                periodTypeStr: function() {
                    return this.periodType == 'yearly' ? 'Year' : 'Month';
                }
            },
            mounted() {
                $('input[name="start"]').on('changeDate', () => {
                    this.start = $('input[name="start"]').val()
                });
                $('input[name="end"]').on('changeDate', () => {
                    this.end = $('input[name="end"]').val()
                });
                $('input[name="grace_start"]').on('changeDate', () => {
                    this.graceStart = $('input[name="grace_start"]').val()
                });
                $('input[name="grace_end"]').on('changeDate', () => {
                    this.graceEnd = $('input[name="grace_end"]').val()
                });
            },
            created() {
                watcher.$on('certificateSelected', function() {
                    $('input[name="certificate_ids"]').val(
                        $('#lease-certificates').val().toString()
                    );
                });
            },
        });

    </script>
@stop
