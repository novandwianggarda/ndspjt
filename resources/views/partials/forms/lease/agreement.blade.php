<accordion name="collapse-lease-agreement" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        LEASE AGREEMENT
    </div>

    <frgroup>
        <label slot="label">
            Nama Notaris
        </label>
        <input type="text" name="lease_deed" value="{{ old('lease_deed') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            No Akta Sewa
        </label>
        <input type="text" name="lease_deed_number" value="{{ old('lease_deed_number') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Tanggal Akta Sewa
        </label>
        <indate name="lease_deed_date" bind-to="leaseDeedDate" v-bind:dateval="leaseDeedDate"></indate>
    </frgroup>

</accordion>
