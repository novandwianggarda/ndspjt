@extends('adminlte::page')

@section('title', 'Land Lord')

@section('content_header')
    <h1>TAX Year</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Tax Year</h3>                
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>
                            <tr>
                                <td>NOP </td>
                                <td>{{ $year->taxye->nop }}</td>
                            </tr>

                            <tr>
                                <td>Nama Sertifikat</td>
                                <td>{{ $year->certye->nama_sertifikat }}</td>
                            </tr>
                            <tr>
                                <td>Type Sertifikat</td>
                                <td>{{ $year->certye->type->short_name }}</td>
                            </tr>


                            <tr>
                                <td>Tahun Pajak </td>
                                <td>{{ $year->year }}</td>
                            </tr>


                            <tr>
                                <td>Letak Objek Pajak :</td>
                                <td>{{ $year->taxye->letak_objek_pajak }}</td>
                            </tr>

                            <tr>
                                <td>Kelurahan PBB </td>
                                <td>{{ $year->taxye->kelurahan_pbb }}</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah PBB </td>
                                <td>{{ $year->taxye->luas_tanah_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Luas Bangun PBB </td>
                                <td>{{ $year->taxye->luas_bangun_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Year </td>
                                <td>{{ $year->year }}</td>
                            </tr>

                            <tr>
                                <td>NJOP Land </td>
                                <td>{{ $year->njop_land }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Building :</td>
                                <td>{{ $year->njop_building }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Total </td>
                                <td>{{ $year->njop_total }}</td>
                            </tr>

                            <tr>
                                <td>Nominal ly </td>
                                <td>{{ $year->taxye->nominal_ly }}</td>
                            </tr>

                            <tr>
                                <td>Due Date </td>
                                <td>{{ $year->taxye->due_date }}</td>
                            </tr>
                            

                            <tr>
                                <td>Due Date ly </td>
                                <td>{{ $year->taxye->due_date_ly }}</td>
                            </tr>

                            <tr>
                                <td>Selisih</td>
                                <td>{{ $year->taxye->selisih }}</td>
                            </tr>
                           
                            


                           
                            @foreach ($year->getAttributes() as $index => $value)
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