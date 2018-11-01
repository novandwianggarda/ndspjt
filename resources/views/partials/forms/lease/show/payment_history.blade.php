<accordion name="collapse-payment-history" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        PAYMENT & HISTORY
    </div>

    <frgroup>
        <label slot="label">
            Payment History
        </label>

        <div class="col-md-12">
            @foreach($payment_history as $mydata)
                <div class="col-md-4">Total  &nbsp; : {{$mydata->total}}</div>
                <div class="col-md-4">Paid Date  &nbsp; : {{$mydata->paid_date}}</div>
                <div class="col-md-4">Note  &nbsp; : {{$mydata->note}}</div>
            @endforeach
        </div>

    </frgroup>

</accordion>
