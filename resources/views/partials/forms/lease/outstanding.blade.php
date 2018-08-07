<accordion name="collapse-outstanding">

    <div slot="title" class="ll-head">
        OUTSTANDING
    </div>

    <!-- PAYMENT HISTORY -->
    @include('partials.forms.lease.payment_history')

    <frgroup>
        <label slot="label">
            Keterangan
        </label>
        <textarea name="note" cols="30" rows="10" class="form-control"></textarea>
    </frgroup>

</accordion>
