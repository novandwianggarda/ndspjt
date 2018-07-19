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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" id="form-lease" action="/leases/add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box box-success">
                                <!-- LAND -->
                                @include('partials.forms.lease.land')
                                <!-- PROPERTY -->
                                @include('partials.forms.lease.property')
                                <!-- LEASE -->
                                @include('partials.forms.lease.lease')
                                <div class="form-group">
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

        var fvue = new Vue({
            el: '#form-lease',
            data: {
                start: "{{ old('start') }}",
                end: "{{ old('end') }}",
                graceStart: "{{ old('grace_start') }}",
                graceEnd: "{{ old('grace_end') }}",
                feeTotal: 0,
                brokFeeTotal: 0,
            },
            computed: {
                gracePeriod: function() {
                    return this.diffTwoDate(this.graceStart, this.graceEnd, 30);
                },
                duration: function() {
                    return this.diffTwoDate(this.start, this.end, 365);
                },
            },
            methods: {
                diffTwoDate: function(start, end, base){
                    var startDate = moment(new Date(start));
                    var endDate = moment(new Date(end));
                    return (endDate.diff(startDate, 'days') / base).toFixed(2);
                }
            },
            watch: {
                question: function (newQuestion, oldQuestion) {
                this.answer = 'Waiting for you to stop typing...'
                this.debouncedGetAnswer()
                }
            },
            mounted() {
                $('input[name="start"]').on('changeDate', () => { this.start = $('input[name="start"]').val() });
                $('input[name="end"]').on('changeDate', () => { this.end = $('input[name="end"]').val() });
                $('input[name="grace_start"]').on('changeDate', () => { this.graceStart = $('input[name="grace_start"]').val() });
                $('input[name="grace_end"]').on('changeDate', () => { this.graceEnd = $('input[name="grace_end"]').val() });
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
