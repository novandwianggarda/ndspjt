@extends('adminlte::page')

@section('title', 'Add User')

@section('content_header')
    <h1>Add User</h1>
@stop

@section('content')
    <row-box>
        <!--ERRORS-->
        @include('partials.errors')
        <form class="form-horizontal" id="form-lease" action="" method="POST">
            @csrf
           <div class="col-sm-5">
                 <div class="box-group">
                    
          <frgroup class>
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
    </div>
               

           </div>


                    <!-- SUBMIT BTN -->
                    <div class="form-group" style="margin-top:15px;">
                        <div class="col-sm-12" style="padding:0px 25px">
                            <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 20px">
                                <i class="fa fa-plus"></i>
                                Submit
                            </button>
                        </div>
                    </div>

        </form>
    </row-box>
@stop
