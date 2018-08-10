@extends('adminlte::page')

@section('title', 'Add Lease')

@section('content_header')
    <h1>{{ trans('lease.m_add_lease') }}</h1>
@stop

@section('content')
    <row-box>
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
    </row-box>
@stop

@section('css')

@stop

@section('js')
    <script>

        var form = $('#form-add-lease');

        // property
        var oldLandArea = "{{ old('prop_land_area') }}";
        var oldBuildingArea = "{{ old('prop_building_area') }}";

        // lease
        oldStart = "{{ old('start') }}";
        oldEnd = "{{ old('end') }}";

        // lease deed
        var oldLeaseDeedDate = "{{ old('lease_deed_date') }}";

        // lease price
        var oldRentAssurance = "{{ old('rent_assurance') }}";

        // lease grace period
        var oldPeriodType = "{{ old('period_type') }}" === '' ? 'yearly' : "{{ old('period_type') }}";

        // lease broker
        var oldBrokFeeYearly = "{{ old('brok_fee_yearly') }}" === '' ? 0 : parseInt("{{ old('brok_fee_yearly') }}");

        // lease payment terms
        oldPaymentTerms = "{{ old('payment_terms') }}" === '' ? [] : "{{ old('payment_terms') }}";
        vueShared.paymentTerms = oldPaymentTerms;

        // lease payment history
        oldPaymentHistory = "{{ old('payment_history') }}" === '' ? [] : "{{ old('payment_history') }}";
        vueShared.paymentHistory = oldPaymentHistory;

        var fvue = new Vue({
            el: '#form-lease',
            data: {
                // shared
                shared: vueShared,

                // land
                certificateIds: '',
                landArea: oldLandArea,
                buildingArea: oldBuildingArea,

                // lease
                start: oldStart,
                end: oldStart,
                periodType: oldPeriodType,
                lessorPKP: 'false',

                // lease deed
                leaseDeedDate: oldLeaseDeedDate,

                // lease price
                rentPrice: 0,
                rentAssurance: oldRentAssurance,
                rentMonthlyM2Type: 'building',

                // lease grace
                graceStart: "{{ old('grace_start') }}",
                graceEnd: "{{ old('grace_end') }}",

                // lease broker
                brokFeeYearly: oldBrokFeeYearly,
            },
            computed: {
                // lease
                duration: function() {
                    return diffTwoDates(this.start, this.end, this.periodType);
                },
                periodTypeStr: function() {
                    return this.periodType == 'yearly' ? 'Year' : 'Month';
                },

                // lease price
                rentPriceTotal: function() {
                    return this.duration * this.rentPrice;
                    // return roundHundred(this.duration * this.rentPrice);
                },
                rentPricePPN: function() {
                    if (this.lessorPKP === 'false') return 0;
                    return this.rentPrice * 0.10;
                },
                rentPricePPH: function() {
                    // if (this.lessorPKP === 'false') return 0;
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
                    if (this.periodType === 'yearly') {
                        return this.rentPrice / 12 / parseInt(area);
                    } else {
                        return this.rentPrice / parseInt(area);
                    }
                },

                // lease grace
                gracePeriod: function() {
                    return diffTwoDates(this.graceStart, this.graceEnd, 'monthly');
                },

                // lease broker
                brokFeeTotal: function() {
                    return this.brokFeeYearly * this.duration;
                },

                // lease payment terms
                paymentTermsText : function() {
                    return JSON.stringify(this.shared.paymentTerms);
                },

            },
            methods: {
                addPaymentTerms: function() {
                    console.log('123');
                }
            },
            created() {
                var vm = this;
                vueEvent.$on('LC-certificateSelected', function() {
                    vm.certificateIds = $('#lease-certificates').val().toString();
                });
                vueEvent.$on('ID-dateChanged', function(bindTo, date) {
                    _.set(vm, bindTo, date)
                });
            },
        });

    </script>
@stop
