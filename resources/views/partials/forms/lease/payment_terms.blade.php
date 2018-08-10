<accordion name="collapse-lease-payment" v-bind:sub="true" style="margin-bottom:10px;" collapse="in">

    <div slot="title" class="ll-head-2">
        PAYMENT TERMS
    </div>

    <input type="hidden" name="payment_terms" v-bind:value="paymentTermsText">

    <lease-payment-terms @add="addPaymentTerms"></lease-payment-terms>

</accordion>
