<accordion name="collapse-invoice" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        TAGIHAN LAINYA
    </div>

    <input type="hidden" name="payment_invoices" v-bind:value="paymentInvoicesText">

    <lease-payment-invoices></lease-payment-invoices>

</accordion>
