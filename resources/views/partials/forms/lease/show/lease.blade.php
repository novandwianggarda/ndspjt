<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <frgroup>
        <label slot="label">
            Yang Menyewakan
        </label>
        <div>{{ $lease->lessor }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            PKP Yang Menyewakan
        </label>
        <div class="input-group">
            {{ $lease->lessor_pkp }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Penyewa
        </label>
        <div>{{ $lease->tenant }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Rent Assuransi
        </label>
        <div>{{ $lease->rent_assurance }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
           Keperluan Sewa
        </label>
        <div>{{ $lease->purpose }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            PIC
        </label>
        <div>{{ $lease->pic }}
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

    <!-- INVOICE -->
    @include('partials.forms.lease.show.payment_invoice')
    

    <!-- PAYMENT HISTORY -->
    @include('partials.forms.lease.show.payment_history')

    <!-- BROKER -->
    @include('partials.forms.lease.show.broker')

    <!-- OTHER -->
    @include('partials.forms.lease.show.other')

</div>

</accordion>
