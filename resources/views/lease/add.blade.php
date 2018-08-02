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
                                            Submit
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

        // Only bind property that are used to calculate something

        var form = $('#form-lease');
        var oldBrokFeeYearly = "{{ old('brok_fee_yearly') }}" == '' ? 0 : parseInt(oldBrokFeeYearly);
        var oldPeriodType = "{{ old('period_type') }}" == '' ? 'yearly' : oldPeriodType;
        var oldLandArea = "{{ old('prop_land_area') }}";
        var oldBuildingArea = "{{ old('prop_building_area') }}";
        var oldRentAssurance = "{{ old('rent_assurance') }}";

        var fvue = new Vue({
            el: '#form-lease',
            data: {
                certificateIds: '',
                start: "{{ old('start') }}",
                end: "{{ old('end') }}",
                periodType: oldPeriodType,
                lessorPKP: 'false',
                graceStart: "{{ old('grace_start') }}",
                graceEnd: "{{ old('grace_end') }}",
                brokFeeYearly: oldBrokFeeYearly,
                rentPrice: 0,
                rentAssurance: oldRentAssurance,
                rentMonthlyM2Type: 'building',
                landArea: oldLandArea,
                buildingArea: oldBuildingArea,

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
                },
                rentPriceTotal: function() {
                    return this.duration * this.rentPrice;
                    // return roundHundred(this.duration * this.rentPrice);
                },
                rentPricePPN: function() {
                    if (this.lessorPKP === 'false') return 0;
                    return this.rentPrice * 0.10;
                },
                rentPricePPH: function() {
                    if (this.lessorPKP === 'false') return 0;
                    return this.rentPrice * 0.10;
                },
                rentPriceTotalWithPPN: function() {
                    return this.rentPriceTotal + this.rentPricePPN;
                },
                rentIncomeTotal: function() {
                    return (this.rentPriceTotalWithPPN - this.rentPricePPH - this.brokFeeTotal);
                    // return (this.rentPriceTotalWithPPN - this.rentPricePPH - this.brokFeeTotal) / this.duration;
                },
                rentPriceMonthlyM2: function() {
                    var area = this.rentMonthlyM2Type === 'land' ? this.landArea : this.buildingArea;
                    return this.rentPrice / 12 / parseInt(area);
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
                var vm = this;
                watcher.$on('certificateSelected', function() {
                    vm.certificateIds = $('#lease-certificates').val().toString();
                });
            },
        });

    </script>
@stop
