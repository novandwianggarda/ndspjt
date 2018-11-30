<accordion name="collapse-payment-history" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        PAYMENT & HISTORY
    </div>
    <table border="1">
    <div class="col-md-12">
    		<div>
    			<p> Data Sebelumnya</p>
    		</div>
            @foreach($payment_hist as $mydata)
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

    <frgroup>
        <label slot="label">
            Balance
        </label>
        {!! Form::text('balance', null, ['class'=>'form-control', 'Placeholder'=>'Input balance']) !!}
        {!! $errors->has('balance')?$errors->first('balance'):'' !!}
    </frgroup>
    <frgroup>
        <label slot="label">
            Due Date
        </label>
        {!! Form::date('due_date', date($lease->due_date), ['class' => 'form-control']) !!}
    </frgroup>

    

</accordion>
