@extends('adminlte::page')

@section('title', 'Certificate')

@section('content_header')
    <h1>Certificate dengan beberapa PBB Anda</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center;">DS ESTATES</h1>
                <h3 style="text-align: center;">Data Certificate PBB</h3>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover bordered table-bordered">
                        <tbody>
                            
                            <tr>
                                <td>NOP</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->nop }}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <td>Letak Objek Pajak</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->letak_objek_pajak }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Kelurahan PBB</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->kelurahan_pbb }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Luas Sertifikat</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->luas_sertifikat }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Penanggung PBB</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->pen_pbb }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Luas Tanah PBB</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->luas_tanah_pbb }}&nbsp;m<sup>2</sup></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Luas Bangun PBB</td>
                                @foreach($certificate->certax as $cer)
                                    <td>{{ $cer->luas_bangun_pbb }}&nbsp;m<sup>2</sup></td>
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
