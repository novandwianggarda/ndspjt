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
                      <div class="box-group">
      <frgroup>
        <label>
            Nama Lengkap
        </label>
        <input type="text" name="" class="form-control"/>
    </frgroup>
        <frgroup>
            <label>
                Username
            </label>
            <input type="text" name="" class="form-control"/>
        </frgroup>
        <frgroup>
            <label>
                Password
            </label>
            <input type="Password" name="" class="form-control"/>
        </frgroup>
</div
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



>