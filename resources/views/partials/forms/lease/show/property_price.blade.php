<accordion name="collapse-property-price" v-bind:sub="true" collapse="in">

        <div slot="title" class="ll-head-2">
            OFFER PRICE
        </div>

        <frgroup>
            <label slot="label">
               Penawaran per Bulan
            </label>
            <div>: &nbsp;{{ $lease->sell_monthly }}</div>
        </frgroup>

        <frgroup>
            <label slot="label">
               Penawaran per Bulan
            </label>
            <div>: &nbsp;{{ $lease->sell_yearly }}</div>
        </frgroup>

</accordion>
