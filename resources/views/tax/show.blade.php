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
                                <td>Nama Sertifikat</td>
                                <td>@foreach ($tax->certax as $b)
                                        
                            <?php 
                                print_r($b->nama_sertifikat)
                            ?>
                                    @endforeach
                                </td>

                            </tr>

                            <tr>
                                <td>Jenis</td>
                                <td>
                                    @foreach ($tax->certax as $b)
                                        {{ $b->type->short_name }}&nbsp; ( {{$b->type->long_name}} )
                                    @endforeach
                                </td>
                            </tr>
                           

                            <tr>
                                <td>Folder PBB Kini</td>
                                <td>{{ $tax->folder_pbb }}</td>
                            </tr>
                            <tr>
                                <td>Luas Sertifikat </td>
                                <td>{{ $tax->luas_sertifikat }}</td>
                            </tr>
                            <tr>
                                <td>Rencana Group </td>
                                <td>{{ $tax->rencana_group }}</td>
                            </tr>


                            <tr>
                                <td>Penanggung PBB  </td>
                                <td>{{ $tax->pen_pbb  }}</td>
                            </tr>


                            <tr>
                                <td>Wajib Pajak </td>
                                <td>{{ $tax->wajib_pajak }}</td>
                            </tr>


                            <tr>
                                <td>Letak Objek Pajak :</td>
                                <td>{{ $tax->letak_objek_pajak }}</td>
                            </tr>

                            <tr>
                                <td>Kelurahan PBB </td>
                                <td>{{ $tax->kelurahan_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Kota PBB </td>
                                <td>{{ $tax->kota_pbb }}</td>
                            </tr>

                            <tr>
                                <td>NOP </td>
                                <td>{{ $tax->nop }}</td>
                            </tr>

                            <tr>
                                <td>Luas Tanah PBB </td>
                                <td>{{ $tax->luas_tanah_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Luas Bangun PBB </td>
                                <td>{{ $tax->luas_bangun_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Year </td>
                                <td>{{ $tax->year }}</td>
                            </tr>

                            <tr>
                                <td>NJOP Land </td>
                                <td>{{ $tax->njop_land }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Building :</td>
                                <td>{{ $tax->njop_building }}</td>
                            </tr>
                            <tr>
                                <td>NJOP Total </td>
                                <td>{{ $tax->njop_total }}</td>
                            </tr>

                            <tr>
                                <td>Nominal ly </td>
                                <td>{{ $tax->nominal_ly }}</td>
                            </tr>

                            <tr>
                                <td>Due Date </td>
                                <td>{{ $tax->due_date }}</td>
                            </tr>
                            

                            <tr>
                                <td>Due Date ly </td>
                                <td>{{ $tax->due_date_ly }}</td>
                            </tr>

                            <tr>
                                <td>Selisih</td>
                                <td>{{ $tax->selisih }}</td>
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