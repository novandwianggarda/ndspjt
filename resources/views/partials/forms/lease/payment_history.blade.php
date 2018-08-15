<accordion name="collapse-payment-history" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        PAYMENT & HISTORY
    </div>

    <input type="hidden" name="payment_history" v-bind:value="shared.paymentHistory">

    <lease-payment-history></lease-payment-history>

</accordion>
