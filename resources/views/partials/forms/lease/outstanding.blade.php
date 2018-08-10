<accordion name="collapse-outstanding" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        OUTSTANDING
    </div>

    <frgroup>
        <label slot="label">
            Jaminan
        </label>
        <money name="rent_assurance" class="form-control" v-bind:value="rentAssurance"></money>
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
            Total Sewa + PPN
        </label>
        <money class="form-control" v-bind:value="rentPriceTotalWithPPN" disabled></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Pendapatan Setelah PPh &amp; Fee
        </label>
        <money class="form-control" v-bind:value="rentIncomeTotal" disabled></money>
    </frgroup>

</accordion>
