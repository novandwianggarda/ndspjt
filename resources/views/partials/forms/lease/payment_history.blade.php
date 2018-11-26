<accordion name="collapse-payment-history" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BALANCE & PAYMENT HISTORY
    </div>

    <input type="hidden" name="payment_history" v-bind:value="paymentHistoryText">

    <lease-payment-history></lease-payment-history>


    <frgroup>
        <label slot="label">
	    	Balance
        </label>
        {!! Form::text('balance', null, ['class'=>'form-control', 'Placeholder'=>'Rp. 0']) !!}
        {!! $errors->has('balance')?$errors->first('balance'):'' !!}
    </frgroup>
    <frgroup>
        <label slot="label">
	    	Due Date
        </label>
	    <indate name="due_date" bind-to="due_date" v-bind:dateval="due_date"></indate>
    </frgroup>

</accordion>
