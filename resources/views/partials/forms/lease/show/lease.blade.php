<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <frgroup>
        <label slot="label">
            Yang Menyewakan
        </label>
        <div>:&nbsp;&nbsp;{{ $lease->lessor }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            PKP Yang Menyewakan
        </label>
        <div class="input-group">
            :&nbsp;&nbsp;{{ $lease->lessor_pkp }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Penyewa
        </label>
        <div>:&nbsp;&nbsp;{{ old('tenant', $lease->tenant) }} diubah {{ $lease->tenant }}
        </div>
    </frgroup>

    

    <frgroup>
        <label slot="label">
           Keperluan Sewa
        </label>
        <div>:&nbsp;&nbsp;{{ $lease->purpose }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            PIC
        </label>
        <div>:&nbsp;&nbsp;{{ $lease->pic }}
        </div>
    </frgroup>

    <!-- AGREEMENT -->
    @include('partials.forms.lease.show.agreement')

    <!-- GRACE PERIOD -->
    @include('partials.forms.lease.show.grace')

    <!-- LEASE PERIOD -->
    @include('partials.forms.lease.show.lease_period')

    <!-- LEASE PRICE -->
    @include('partials.forms.lease.show.lease_price')

    <!-- PAYMENT TERMS-->
    @include('partials.forms.lease.show.payment_term')
    <!-- Balance PAYMENT HISTORY -->
    @include('partials.forms.lease.show.payment_history')

    <!-- INVOICE Tagihan -->
    @include('partials.forms.lease.show.payment_invoice')
    


    <!-- BROKER -->
    @include('partials.forms.lease.show.broker')

    <!-- OTHER -->
    @include('partials.forms.lease.show.other')

</div>

</accordion>
