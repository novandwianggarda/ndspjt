<accordion name="collapse-payment-history" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BALANCE & PAYMENT HISTORY
    </div>

    <frgroup>
        <label slot="label">
            Payment History
        </label>

        <div class="col-md-12">
            @foreach($payment_history as $mydata)
                <div class="col-md-4">Total  &nbsp; : {{$mydata->total}}</div>
                <div class="col-md-4">Paid Date  &nbsp; : 
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
                <div class="col-md-4">Note  &nbsp; : {{$mydata->note}}</div>
            @endforeach
        </div>

    </frgroup>


    <frgroup  wl="2" wi="4">
        <label slot="label">
            Balance
        </label>
        <div>:&nbsp;Rp.
            <?php 

                $bal = $lease->balance;
                echo number_format($bal, 0, ".", ".")."<br />";
            ?>
        </div>

    </frgroup>
    <frgroup  wl="2" wi="4">
        <label slot="label">
            Due Date
        </label>
        <div>:&nbsp;
        {{ $lease->due_date }}</div>
    </frgroup>


</accordion>
