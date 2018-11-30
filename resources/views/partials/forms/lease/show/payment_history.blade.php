<accordion name="collapse-payment-history" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BALANCE & PAYMENT HISTORY
    </div>

    <frgroup>
        <label slot="label">
            Payment History
        </label>

        <div class="col-md-12">
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
        </div>

    </frgroup>


</accordion>
