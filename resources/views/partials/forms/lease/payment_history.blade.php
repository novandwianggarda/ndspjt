<accordion name="collapse-payment-history" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BALANCE & PAYMENT HISTORY
    </div>

    <input type="hidden" name="payment_history" v-bind:value="paymentHistoryText">

    <lease-payment-history></lease-payment-history>

	<div class="col-md-3 col-sm-6 col-xs-3">
	    
	        <label slot="label">
	            Balance
	        </label>
	        <input type="text" name="balance" value="{{ old('balance') }}" class="form-control" />
	    
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	        <label slot="label">
	            Tanggal
	        </label>
	        <indate name="end" bind-to="end" v-bind:dateval="end"></indate>
	</div>

</accordion>
