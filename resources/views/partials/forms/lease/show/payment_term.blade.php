<accordion name="collapse-lease-payment" v-bind:sub="true" style="margin-bottom:10px;" collapse="in">

    <div slot="title" class="ll-head-2">
        PAYMENT TERMS
    </div>

    <frgroup>
        <label slot="label">
            Payment TERMS
        </label>
        <div>{{ $lease->payment_terms }}
        </div>
    </frgroup>

</accordion>
