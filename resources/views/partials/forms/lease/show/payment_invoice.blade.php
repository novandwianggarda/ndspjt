<accordion name="collapse-invoice" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        INVOICE: PBB, FINE, ETC
    </div>

    <frgroup>
        <label slot="label">
            Payment INVOICE
        </label>
        <div>{{ $lease->payment_invoices }}
        </div>
    </frgroup>

</accordion>
