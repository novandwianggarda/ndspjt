<accordion name="collapse-property-price" sub="true">

        <div slot="title" class="ll-head-2">
            HARGA PENAWARAN
        </div>

        <frgroup>
            <label slot="label">
                Penawaran per Bulan
            </label>
            <money name="sell_monthly" class="form-control" value="{{ old('sell_monthly') }}"></money>
        </frgroup>

        <frgroup>
            <label slot="label">
                Penawaran per Tahun
            </label>
            <money name="sell_yearly" class="form-control" value="{{ old('sell_yearly') }}"></money>
        </frgroup>

</accordion>
