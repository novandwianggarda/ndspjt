<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        {{ trans('lease.hd_lease') }}
    </div>

    <frgroup>
        <label slot="label">
            Yang Menyewakan
        </label>
        <input type="text" name="lessor" value="{{ old('lessor') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Penyewa
        </label>
        <input type="text" name="tenant" value="{{ old('tenant') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            No Akta Sewa
        </label>
        <input type="text" name="lease_deed" value="{{ old('lease_deed') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Tanggal Akta Sewa
        </label>
        <indate name="lease_deed_date" value="{{ old('lease_deed_date') }}"></indate>
    </frgroup>


    <frgroup>
        <label slot="label">
            PKP Yang Menyewakan
        </label>
        <div class="input-group">
            <label class="radio-inline"><input type="radio" v-model="lessorPKP" value="true">Ya</label>
            <label class="radio-inline"><input type="radio" v-model="lessorPKP" value="false">Tidak</label>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Keperluan Sewa
        </label>
        <input type="text" name="purpose" value="{{ old('purpose') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            PIC
        </label>
        <input type="text" name="pic" value="{{ old('pic') }}" class="form-control" />
    </frgroup>

    <!-- GRACE -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.grace')

    <frgroup wl="2" wi="4">
        <label slot="label">
            Awal Sewa
        </label>
        <indate name="start" value="{{ old('start') }}"></indate>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Akhir Sewa
        </label>
        <indate name="end" value="{{ old('end') }}"></indate>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Periode Sewa
        </label>
        <div class="input-group">
            <select name="period_type" class="form-control" v-model="periodType">
                <option value="yearly" selected>Yearly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Masa Sewa
        </label>
        <label v-text="duration + ' ' + periodTypeStr"></label>
    </frgroup>

    <!-- PRICE -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.lease_price')

    <!-- BROKER -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.broker')

</div>

</accordion>
