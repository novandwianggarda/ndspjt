<accordion name="collapse-broker" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        BROKER
    </div>

    <frgroup>
        <label slot="label">
            Nama Broker
        </label>
        <input type="text" name="brok_name" value="{{ old('brok_name') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee per Tahun
        </label>
        <money name="brok_fee_yearly" v-model="brokFeeYearly" class="form-control"></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee Total
        </label>
        <money v-bind:value="brokFeeTotal" disabled="disabled" class="form-control"></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee Terbayar
        </label>
        <money name="brok_fee_paid" value="{{ old('brok_fee_paid') }}" class="form-control"></money>
    </frgroup>

</accordion>
