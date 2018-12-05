<accordion name="collapse-invoice" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        TAGIHAN LAIN NYA
    </div>

    <frgroup>
        <label slot="label">
            Tagihan
        </label>

        <div class="col-md-12">
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
        </div>
    </frgroup>

</accordion>
