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
                                <td>Folder Sertifikat kini</td>
                                <td>{{ $certificate->folder_sert }}</td>
                            </tr>
                            <tr>
                                <td>No di Folder</td>
                                <td>{{ $certificate->no_folder }}</td>
                            </tr>
                            
                            <tr>
                                <td>Kepemilikan Sertifikat / Tanah </td>
                                <td>{{ $certificate->kepemilikan }}</td>
                            </tr>

                            <tr>
                                <td>Nama Sertifikat </td>
                                <td>{{ $certificate->nama_sertifikat }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>{{ $certificate->keterangan }}</td> 
                            </tr>
                            <tr>
                                <td>Archive</td>
                                <td>{{ $certificate->archive }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Sertifikat</td>
                                <td>{{ $certificate->type->short_name }} &nbsp;( {{ $certificate->type->long_name }} )</td>
                            </tr>

                            <tr>
                                <td>No Hm / Hgb</td>
                                <td>{{ $certificate->no_hm_hgb }}</td>
                            </tr> 

                            <tr>
                                <td>Kelurahan </td>
                                <td>{{ $certificate->kelurahan }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan </td>
                                <td>{{ $certificate->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Kota </td>
                                <td>{{ $certificate->kota }}</td>
                            </tr>

                            <tr>
                                <td>Luas Sertifikat </td>
                                <td>{{ $certificate->luas_sertifikat }}</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>{{ $certificate->addrees }}</td>
                            </tr>

                            <tr>
                                <td>Purposes </td>
                                <td>{{ $certificate->purposes }}</td>
                            </tr>

                            <tr>
                                <td>Penanggung PBB </td>
                                <td>{{ $certificate->penanggung_pbb }}</td>
                            </tr>
                            <tr>
                                <td>Wajib Pajak </td>
                                <td>{{ $certificate->wajib_pajak }}</td>
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
                                <td>Ajb Nominal </td>
                                <td>{{ $certificate->ajb_nominal }}</td>
                            </tr>

                            <tr>
                                <td>Ajb Date</td>
                                <td>{{ $certificate->ajb_date }}</td>
                            </tr>
                             <tr>
                                <td>Map Coordinate </td>
                                <td>{{ $certificate->map_coordinate }}</td>
                            </tr>

                            <tr>
                                <td>Letak Objek Pajak</td>
                                <td>{{ $certificate->letak_objek_pajak }}</td>
                            </tr>
                             <tr>
                                <td>Kelurahan PBB </td>
                                <td>{{ $certificate->kelurahan_pbb }}</td>
                            </tr>  

                            <tr>
                                <td>Kota PBB</td>
                                <td>{{ $certificate->kota_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Nop</td>
                                <td>{{ $certificate->nop }}</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah PBB</td>
                                <td>{{ $certificate->luas_tanah_pbb }}</td>
                            </tr>

                            <tr>
                                <td>Luas Bangun PBB</td>
                                <td>{{ $certificate->luas_bangun_pbb }}</td>
                            </tr>
                            
                           <tr>
                                @foreach ($certificate->cerdoc as $cert)
                                <td>
                                   
                                    <img src="{{ url('file/certifate/'.$cert->nama_file)}}" class="img-responsive" alt="images" width="200" height="100">
                                    <p align="left">Title : {{ $cert->title }}</p>


                                </td>
                                @endforeach
                           </tr>
                           


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
