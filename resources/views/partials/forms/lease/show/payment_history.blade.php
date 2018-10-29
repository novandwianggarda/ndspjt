<accordion name="collapse-payment-history" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        PAYMENT & HISTORY
    </div>

    <frgroup>
        <label slot="label">
            Payment History
        </label>
        <div>{{ $lease->payment_history }}
        </div>
    </frgroup>

</accordion>
