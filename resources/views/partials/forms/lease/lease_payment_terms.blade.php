<accordion name="collapse-lease-payment" style="margin-bottom:10px;">

    <div slot="title" class="ll-head-2">
        PAYMENT TERMS
    </div>

    <input type="hidden" name="lease_payment_terms">

    <lease-payment-terms v-bind:rows="paymentTerms" @add="addPaymentTerms"></lease-payment-terms>

</accordion>
