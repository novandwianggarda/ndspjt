<accordion name="collapse-invoice" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        TAGIHAN LAIN NYA
    </div>

    <frgroup>
        <label slot="label">
            Tagihan
        </label>

        <div class="col-md-12">
            @foreach($payment_invoices as $mydata)
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

</accordion>
