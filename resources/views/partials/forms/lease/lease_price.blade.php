<accordion name="collapse-lease-price">

    <div slot="title" class="ll-head-2">
        HARGA SEWA
    </div>

    <frgroup>
        <label slot="label">
            Jaminan
        </label>
        <money name="rent_assurance" class="form-control" v-bind:value="rentAssurance"></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Sewa <span v-text="periodType"></span> (DPP)
        </label>
        <money name="rent_price" class="form-control" v-model="rentPrice"></money>
    </frgroup>

    <frgroup wl="2" wi="2">
        <label slot="label">
            Tipe Luas
        </label>
        <select name="rent_monthly_type" v-model="rentMonthlyM2Type" class="form-control">
            <option value="building" selected>Building</option>
            <option value="land">Land</option>
        </select>
    </frgroup>

    <frgroup wl="2" wi="6">
        <label slot="label">
            Sewa Perbulan /m2
        </label>
        <money class="form-control" v-bind:value="rentPriceMonthlyM2" disabled></money>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup>
        <label slot="label">
            Total Sewa
        </label>
        <money class="form-control" v-bind:value="rentPriceTotal" disabled></money>
    </frgroup>

    <!-- PAYMENT -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.lease_payment_terms')

    <frgroup>
        <label slot="label">
            Total PPh
        </label>
        <money class="form-control" v-bind:value="rentPricePPH" disabled></money>
    </frgroup>

    <div v-show="lessorPKP === 'true'">
        <frgroup>
            <label slot="label">
                Total PPN
            </label>
            <money class="form-control" v-bind:value="rentPricePPN" disabled></money>
        </frgroup>

        <frgroup>
            <label slot="label">
                Total Sewa + PPN
            </label>
            <money class="form-control" v-bind:value="rentPriceTotalWithPPN" disabled></money>
        </frgroup>

    </div>

    {{-- <frgroup>
        <label slot="label">
            Pendapatan Setelah PPh &amp; Fee
        </label>
        <money class="form-control" v-bind:value="rentIncomeTotal" disabled></money>
    </frgroup> --}}

</accordion>
