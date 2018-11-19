<accordion name="collapse-payment-history" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        PAYMENT & HISTORY
    </div>
    <table border="1">
    <div class="col-md-12">
    		<div>
    			<p> Data Sebelumnya</p>
    		</div>
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
    </table>

    <input type="hidden" name="payment_history" v-bind:value="paymentHistoryText">

    <lease-payment-history></lease-payment-history>

</accordion>
