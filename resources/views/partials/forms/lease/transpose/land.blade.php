 <accordion name="collapse-land" collapse="in" >

    <div slot="title" class="ll-head">
        Transpose
    </div>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Nama Sertifikat</center></th>
                <th><center>No Hm/ Hgb</center></th>
                <th><center>Kota</center></th>
                <th><center>Kecamatan</center></th>
                <th><center>Pemilik</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ $lease->cert->nama_sertifikat }}</td>
                <td align="center">{{ $lease->cert->no_hm_hgb }}</td>
                <td align="center">{{ $lease->cert->kota }}</td>
                <td align="center">{{ $lease->cert->kecamatan }}</td>
                <td align="center">{{ $lease->cert->kepemilikan }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Yang Menyewakan</center></th>
                <th><center>PKP Yang Menyewakan</center></th>
                <th><center>Nama Penyewa</center></th>
                <th><center>Keperluan Sewa</center></th>
                <th><center>PIC</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ $lease->lessor }}</td>
                <td align="center">{{ $lease->lessor_pkp }}</td>
                <td align="center">{{ $lease->tenant }}</td>
                <td align="center">{{ $lease->purpose }}</td>
                <td align="center">{{ $lease->pic }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
               <th><center>Nama Notaris</center></th>
               <th><center>No Akta Sewa</center></th>
               <th><center>Tanggal Akta Sewa</center></th>
               <th><center>Grace Awal</center></th>
               <th><center>Grace Akhir</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ $lease->lease_deed }}</td>
                <td align="center">{{ $lease->lease_number }}</td>
                <td align="center"> <?php 
                        if($lease->lease_deed_date==null){
                            $tang='';
                        }else{ 
                        $tgl=strtotime($lease->lease_deed_date);
                        $tang=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$tang}}
                </td>
                <td align="center">
                    <?php 
                        if($lease->grace_start==null){
                            $gracestr='';
                        }else{ 
                        $tgl=strtotime($lease->grace_start);
                        $gracestr=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$gracestr}}
                </td>
                <td align="center">
                    <?php 
                        if($lease->grace_end==null){
                            $ends='';
                        }else{ 
                        $tgl=strtotime($lease->grace_end);
                        $ends=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$ends}}
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Awal Sewa</center></th>
                <th><center>Akhir Sewa</center></th>
                <th><center>Sewa Per Tahun (DPP)</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                    <?php 
                        if($lease->start==null){
                            $tglstr='';
                        }else{ 
                        $tgl=strtotime($lease->start);
                        $tglstr=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$tglstr}}
                </td>
                <td align="center">
                    <?php 
                        if($lease->end==null){
                            $tglends='';
                        }else{ 
                        $tgl=strtotime($lease->end);
                        $tglends=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$tglends}}
                </td>
                <td align="center">Rp.
                    <?php 

                        $jaminan = $lease->rent_price;
                        echo number_format($jaminan, 0, ".", ".")."<br />";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>


    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Balance &amp; Payment Term</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                    @foreach($payment_teerm as $mydata)

                <div class="col-md-6">Pembayaran  &nbsp; :&nbsp;Rp.
                    <?php 

                        $tagihan = $mydata->total;
                        echo number_format($tagihan, 0, ".", ".")."<br />";
                    ?>
                </div>
                <div class="col-md-6">Due Date  &nbsp; : 
                    <?php 
                        if($mydata->due_date==null){
                            $tang='';
                        }else{ 
                            $tgl=strtotime($mydata->due_date);
                            $tang=date("d F Y", $tgl);
                        }
                    ?>
                {{@$tang}}
                </div>
                <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>
            @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <br>


    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Balance &amp; Payment History</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                     @foreach($payment_hist as $mydata)
                <div class="col-md-6">Pembayaran  &nbsp; :&nbsp;Rp.
                    <?php 

                        $tagihan = $mydata->total;
                        echo number_format($tagihan, 0, ".", ".")."<br />";
                    ?>
                </div>
                <div class="col-md-6">Paid Date  &nbsp; : 
                    <?php 
                        if($mydata->paid_date==null){
                            $tang='';
                        }else{ 
                            $tgl=strtotime($mydata->paid_date);
                            $tang=date("d F Y", $tgl);
                        }
                    ?>
                    {{@$tang}}
                </div>
                <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>
            @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Tagihan Lainya</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                    @foreach($payment_invoice as $mydata)
                        <div class="col-md-6">Pembayaran  &nbsp; :&nbsp;Rp.
                            <?php 

                                $tagihan = $mydata->total;
                                echo number_format((float)$tagihan, 0, ".", ".")."<br />";
                            ?>
                        </div>

                        <div class="col-md-6">Paid Date  &nbsp; :

                            <?php 
                                if($mydata->paid_date==null){
                                    $tang='';
                                }else{ 
                                    $tgl=strtotime($mydata->paid_date);
                                    $tang=date("d F Y", $tgl);
                                }
                            ?>
                            {{@$tang}}
                        </div>
                        <br>
                        <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>

                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Nama Broker</center></th>
                <th><center>Fee Per Tahun</center></th>
                <th><center>Jaminan</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ $lease->brok_name }}</td>
                <td align="center">
                    Rp.
                    <?php 

                        $fee = $lease->brok_fee_yearly;
                        echo number_format((float)$fee, 0, ".", ".")."<br />";
                    ?>
                </td>
                <td align="center">
                    Rp.
                    <?php 

                        $jaminan = $lease->rent_assurance;
                        echo number_format((float)$jaminan, 0, ".", ".")."<br />";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th><center>Notes</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{!! $lease->note !!}</td>
            </tr>
        </tbody>
    </table>
    <div class="clearfix"></div>



</accordion>

