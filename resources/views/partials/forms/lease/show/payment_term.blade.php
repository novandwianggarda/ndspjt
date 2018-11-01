<accordion name="collapse-lease-payment" v-bind:sub="true" style="margin-bottom:10px;" collapse="in">

    <div slot="title" class="ll-head-2">
        PAYMENT TERMS
    </div>

    <frgroup>
        <label slot="label">
            Payment TERMS
        </label>

         <div class="col-md-12">
            @foreach($payment_terms as $mydata)
                <div class="col-md-4">Total  &nbsp; : {{$mydata->total}}</div>
                <div class="col-md-4">Paid Date  &nbsp; : {{$mydata->due_date}}</div>
                <div class="col-md-4">Note  &nbsp; : {{$mydata->note}}</div>
            @endforeach
        </div>


    </frgroup>
</accordion>
