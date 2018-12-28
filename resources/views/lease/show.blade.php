@extends('adminlte::page')

@section('title', 'DS-Land  Lord')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <center><img src="{{asset('img/log2.png')}}" width="5%" /></center>
                
                <div class="box-body">
                    {!! Form::model($lease,  ['route'=>array('updatemodal', $lease->id), 'method' => '', 'id' => 'formshow-lease', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                    @csrf
                        <div class="box-group" id="accordion">
                        <!-- <button onclick="myFunction()"><i class="fa fa-print"></i>Print </button> -->

                            <div class="panel box">
                            <a href="/leases" class="btn btn-warning"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;Back</a>
                            @can('user', $lease)
                                <a href="/leases/edit/{{ $lease->id }}" class="btn btn-success"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a>
                            @endcan  

                            <a href="/leases/print/{{ $lease->id }}" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i>Invoice</a>
                            <a href="/leases/eksportedlease/{{ $lease->id }}" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Export</a>
                            <button class="btn btn-dafault" onclick="myFunction()"><i class="fa fa-print"></i>Print </button>
                            <!-- <a href="/leases/transpose/{{ $lease->id }}" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Transpose</a> -->

                                <!-- LAND -->
                                @include('partials.forms.lease.show.land')
                                <!-- PROPERTY -->
                                <!-- LEASE -->
                                @include('partials.forms.lease.show.lease')
                                
                            </div>
                        </div>



                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
<script>
function myFunction() {
    window.print();
}
</script>

<script type="text/javascript">
        $(document).ready(function() {
        $('.editModalBtn').click(function() {
          var id=$(this).data('id');
          var action ='{{URL::to('updatemodal')}}/'+id;


          var url = '{{URL::to('updatemodal')}}';
          $.ajax({
            type : 'post',
            url  : url,
            data : {'id':id},
            success:function(data){
              $('#id').val(data.id);
              $('.status').val(data.status);
              $('.classFormUpdate').attr('action',action);
              $('#editModal').modal('show');
            }
          });
        });
    });
    </script>


    <script>

        var form = $('#form-add-lease');

        // property
        var oldLandArea = "{{ old('prop_land_area') }}";
        var oldBuildingArea = "{{ old('prop_building_area') }}";

        // lease
        var oldTenantType = "{{ old('tenant_type') }}" === '' ? 'personal' : "{{ old('tenant_type') }}";
        var oldPeriodType = "{{ old('period_type') }}" === '' ? 'yearly' : "{{ old('period_type') }}";

        // lease deed
        var oldLeaseDeedDate = "{{ old('lease_deed_date') }}";

        // lease period
        var oldStart = "{{ old('start') }}";
        var oldEnd = "{{ old('end') }}";

        // lease price
        var oldRentAssurance = "{{ old('rent_assurance') }}";

        // lease broker
        var oldBrokFeeYearly = "{{ old('brok_fee_yearly') }}" === '' ? 0 : parseInt("{{ old('brok_fee_yearly') }}");

        // lease payment terms
        oldPaymentTerms = '{!! old('payment_terms') !!}' === '' ? [] : JSON.parse('{!! old('payment_terms') !!}');
        vueShared.paymentTerms = oldPaymentTerms;

        // lease payment history
        oldPaymentHistory = '{!! old('payment_history') !!}' === '' ? [] : JSON.parse('{!! old('payment_history') !!}');
        vueShared.paymentHistory = oldPaymentHistory;

        // lease invioces
        oldPaymentInvoices = "{{ old('payment_invoices') }}" === '' ? [] : JSON.parse('{{ old('payment_invoices') }}');
        vueShared.paymentInvoices = oldPaymentInvoices;

        var fvue = new Vue({
            el: '#formshow-lease',
            data: {
                // shared
                shared: vueShared,

                // land
                certificateIds: '',
                propertyIds: '',
                landArea: oldLandArea,
                buildingArea: oldBuildingArea,

                // lease
                start: oldStart,
                end: oldStart,
                periodType: oldPeriodType,
                lessorPKP: false,
                tenantType: oldTenantType,

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
                    if (! this.lessorPKP) return 0;
                    return this.rentPrice * 0.10;
                },
                rentPricePPH: function() {
                    // if (! this.lessorPKP) return 0;
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

                // lease payment history
                paymentHistoryText : function() {
                    return JSON.stringify(this.shared.paymentHistory);
                },

                // lease invoices
                paymentInvoicesText : function() {
                    return JSON.stringify(this.shared.paymentInvoices);
                },

            },
            methods: {
                submitForm() {
                    console.log(form.serialize());
                },
                // submitForm: function (event) {
                //   axios.post('add', {
                //     lessor: '',
                //     lessor_pkp: '',
                //     tenant: '',
                //     purpose: '',
                //     start: '',
                //     end: '',
                //     note: '',
                //     lease_deed: '',
                //     lease_deed_date: '',
                //     payment_terms: '',
                //     payment_history: '',
                //     lastName: ''
                // }),
            },
            created() {
                var vm = this;
                vueEvent.$on('LC-certificateSelected', function() {
                    vm.certificateIds = $('#lease-certificates').val().toString();
                });
                vueEvent.$on('LP-propertiesselected', function() {
                    vm.propertyIds = $('#lease-properties').val().toString();
                });
                vueEvent.$on('ID-dateChanged', function(bindTo, date) {
                    _.set(vm, bindTo, date)
                });
            },
        });

    </script>

@stop
