<accordion name="collapse-lease-price" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        LEASE PRICE
    </div>

    <frgroup>
        <label slot="label">
            Sewa <span v-text="periodType"></span> (DPP)
        </label>
        <div>{{ $lease->rent_price }}
        </div>
    </frgroup>

</accordion>
