@extends('adminlte::page')

@section('title', 'Taxes')

@section('content_header')
    <h1>Taxes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Tax</h3>                
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>

                            
                            <tr>
                                <td>Tax Type :</td>
                                <td>{{ $tax->certif->type->short_name }} &nbsp;( {{ $tax->certif->type->long_name }} )</td>
                            </tr>
                            <tr>
                                <td>Certificate Ids :</td>
                                <td>{{ $tax->certificate_ids }}</td>
                            </tr>
                            <tr>
                                <td>NOP:</td>
                                <td>{{ $tax->nop }}</td>
                            </tr>
                            <tr>
                                <td>Owner :</td>
                                <td>{{ $tax->owner }}</td>
                            </tr>
                            <tr>
                                <td>Year :</td>
                                <td>{{ $tax->year }}</td>
                            </tr>
                            <tr>
                                <td>Due Date :</td>
                                <td>{{ $tax->due_date }}</td>
                            </tr>
                            
                            <tr>
                                <td>Nominal ly :</td>
                                <td>{{ $tax->nominal_ly }}</td>
                            </tr>

                            <tr>
                                <td>Due Date ly :</td>
                                <td>{{ $tax->due_date_ly }}</td>
                            </tr>

                            <tr>
                                <td>Note :</td>
                                <td>{{ $tax->note }}</td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td>{{ $tax->addr_address }}</td>
                            </tr>
                            <tr>
                                <td>Addres Village :</td>
                                <td>{{ $tax->addr_village }}</td>
                            </tr>
                            <tr>
                                <td>Addr Land Area :</td>
                                <td>{{ $tax->addr_land_area }}</td>
                            </tr>

                            <tr>
                                <td>Addres Building Area :</td>
                                <td>{{ $tax->addr_building_area }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Land :</td>
                                <td>{{ $tax->njop_land }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Building :</td>
                                <td>{{ $tax->njop_building }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Total :</td>
                                <td>{{ $tax->njop_total }}</td>
                            </tr>
                            <tr>
                                <td>Corp Name :</td>
                                <td>{{ $tax->corp_name }}</td>
                            </tr>
                            <tr>
                                <td>Corp Payment Method:</td>
                                <td>{{ $tax->corp_payment_method }}</td>
                            </tr>
                            <tr>
                                <td>Folder Number:</td>
                                <td>{{ $tax->folder_number }}</td>
                            </tr>
                            <tr>
                                <td>Folder Current</td>
                                <td>{{ $tax->folder_current }}</td>
                            </tr>
                            <tr>
                                <td>Folder Plan :</td>
                                <td>{{ $tax->folder_plan }}</td>
                            </tr>
                           
                            @foreach ($tax->getAttributes() as $index => $value)
                                <!-- <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $value }}</td>
                                </tr> -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        td {
            border-right: 1px solid #ded8cd;
        }
    </style>
@stop

@section('js')

@stop