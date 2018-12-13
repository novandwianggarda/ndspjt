<accordion name="collapse-lease-payment" v-bind:sub="true" style="margin-bottom:10px;" collapse="in">

    <div slot="title" class="ll-head-2">
        PAYMENT TERMS
    </div>

    <frgroup>
        <label slot="label">
            Payment TERMS
        </label>

         <div class="col-md-12">


            @foreach($payment_teerm as $mydata)
                <div class="col-md-6">Pembayaran  &nbsp; :&nbsp;Rp.
                    <?php 

                        $bal = $mydata->total;
                        echo number_format($bal, 0, ".", ".")."<br />";
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
                </div> <br>
                <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>

            @endforeach
        </div>


    </frgroup>
</accordion>
