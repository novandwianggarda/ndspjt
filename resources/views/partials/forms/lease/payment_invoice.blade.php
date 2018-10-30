<accordion name="collapse-invoice" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        INVOICE: PBB, FINE, ETC
    </div>

    <input type="hidden" name="payment_invoices" v-bind:value="paymentInvoicesText">

    <lease-payment-invoices></lease-payment-invoices>

</accordion>
