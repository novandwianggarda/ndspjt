@extends('adminlte::page')

@section('title', 'Certificate')

@section('content_header')
    <h1>Certificate</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Certificate</h3>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>
                            

                            <tr>
                                <td>certificate Type :</td>
                                <td>{{ $certificate->type->short_name }} &nbsp;( {{ $certificate->type->long_name }} )</td>
                            </tr>
                            <tr>
                                <td>Number</td>
                                <td>{{ $certificate->number }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $certificate->name }}</td>
                            </tr>
                            <tr>
                                <td>Nop</td>
                                <td>{{ $certificate->nop }}</td>
                            </tr> 
                            <tr>
                                <td>Owner </td>
                                <td>{{ $certificate->owner }}</td>
                            </tr>
                            <tr>
                                <td>Area </td>
                                <td>{{ $certificate->area }}</td>
                            </tr>
                            <tr>
                                <td>Published Date </td>
                                <td>{{ $certificate->published_date }}</td>
                            </tr>
                            <tr>
                                <td>Expired Date </td>
                                <td>{{ $certificate->expired_date }}</td>
                            </tr>
                            <tr>
                                <td>Note </td>
                                <td>{{ $certificate->note }}</td>
                            </tr>

                            <tr>
                                <td>Address City </td>
                                <td>{{ $certificate->addr_city }}</td>
                            </tr>
                             <tr>
                                <td>Address District </td>
                                <td>{{ $certificate->addr_district }}</td>
                            </tr>

                            <tr>
                                <td>Addres Village </td>
                                <td>{{ $certificate->addr_village }}</td>
                            </tr>
                             <tr>
                                <td>Address</td>
                                <td>{{ $certificate->addr_address }}</td>
                            </tr>  

                            <tr>
                                <td>Ajb Nominal</td>
                                <td>{{ $certificate->ajb_nominal }}</td>
                            </tr>

                            <tr>
                                <td>Ajb Date</td>
                                <td>{{ $certificate->ajb_date }}</td>
                            </tr>
                            <tr>
                                <td>Scan Certificate</td>
                                <td>{{ $certificate->scan_certificate }}</td>
                            </tr>

                            <tr>
                                <td>Scan Plotting</td>
                                <td>{{ $certificate->scan_plotting }}</td>
                            </tr>
                            <tr>
                                <td>Scan Land Siteplan</td>
                                <td>{{ $certificate->scan_land_siteplan }}</td>
                            </tr>
                            <tr>
                                <td>Scan krk</td>
                                <td>{{ $certificate->scan_krk }}</td>
                            </tr>
                            <tr>
                                <td>Scan Imb</td>
                                <td>{{ $certificate->scan_imb }}</td>
                            </tr>

                            <tr>
                                <td>Map Coordinate </td>
                                <td>{{ $certificate->map_coordinate }}</td>
                            </tr>
                            <tr>
                                <td>Map Boundary</td>
                                <td>{{ $certificate->map_boundary }}</td>
                            </tr>
                            <tr>
                                <td>Map Link</td>
                                <td>{{ $certificate->map_link }}</td>
                            </tr>

                            <tr>
                                <td>Folder Number:</td>
                                <td>{{ $certificate->folder_number }}</td>
                            </tr>
                            <tr>
                                <td>Folder Current</td>
                                <td>{{ $certificate->folder_current }}</td>
                            </tr>
                            <tr>
                                <td>Folder Plan :</td>
                                <td>{{ $certificate->folder_plan }}</td>
                            </tr>
                           
                            @foreach ($certificate->getAttributes() as $index => $value)
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
