<accordion name="collapse-lease-price" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE PRICE
    </div>

    <frgroup>
        <label slot="label">
            Sewa <span v-text="periodType"></span> (DPP)
        </label>
        <money name="rent_price" class="form-control" v-model="rentPrice"></money>
    </frgroup>

    <frgroup>
            <label slot="label">
                Jaminan
            </label>
            <money name="rent_assurance" class="form-control" value="{{ old('rent_assurance') }}"></money>
    </frgroup>
    <frgroup>
        <label slot="label">
            Total Sewa
        </label>
        <money class="form-control" v-bind:value="rentPriceTotal" disabled></money>
    </frgroup>


    <frgroup>
        <label slot="label">
            Total PPh
        </label>
        <money class="form-control" v-bind:value="rentPricePPH" disabled></money>
    </frgroup>

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

</accordion>
