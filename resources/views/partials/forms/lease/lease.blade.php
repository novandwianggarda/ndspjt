<accordion name="collapse-lease">

    <div slot="title" class="ll-head">
        {{ trans('lease.hd_lease') }}
    </div>

    <frgroup>
        <label slot="label">
            No Akta Sewa
        </label>
        <input type="text" name="lease_deed" value="{{ old('lease_deed') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Tgl. Akta Sewa
        </label>
        <input type="text" name="lease_deed_date" value="{{ old('lease_deed_date') }}" class="form-control" />
    </frgroup>

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

{{-- <div id="collapse-lease" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Periode Sewa
            </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <select name="period_type" class="form-control" v-model="periodType">
                        <option value="yearly" selected>Yearly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>
            </div>
            <div v-show="duration != 0">
                <label class="col-sm-2 control-label">
                    Masa Sewa
                </label>
                <label class="col-sm-4 label-2" v-text="duration + ' ' + periodTypeStr"></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Jaminan
            </label>
            <div class="col-sm-10">
                <money name="rent_assurance" class="form-control" value="{{ old('rent_assurance') }}"></money>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Sewa per Bulan
            </label>
            <div class="col-sm-10">
                <money name="rent_monthly" class="form-control" value="{{ old('rent_monthly') }}"></money>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Sewa per Tahun
            </label>
            <div class="col-sm-10">
                <money name="rent_yearly" class="form-control" value="{{ old('rent_yearly') }}"></money>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Sewa Total
            </label>
            <div class="col-sm-10">
                <money class="form-control" value=""></money>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Pajak
            </label>
            <div class="col-sm-5">
                <div class="checkbox-inline">
                    <label><input type="checkbox" value="">Include PPN</label>
                </div>
                <div class="checkbox-inline">
                    <label><input type="checkbox" value="">Include PPH</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                PPN
            </label>
            <div class="col-sm-4">
                <money class="form-control" v-bind:value="ppnTotal" disabled></money>
            </div>
            <label class="col-sm-2 control-label">
                PPh
            </label>
            <div class="col-sm-4">
                <money class="form-control" v-bind:value="pphTotal" disabled></money>
            </div>
        </div>
    </div> --}}
    <!-- PRICE -->
    {{-- @include('partials.forms.lease.lease_price') --}}
    <!-- BROKER -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.broker')
    <!-- GRACE -->
    <div class="clearfix"></div>
    @include('partials.forms.lease.grace')
</div>

</accordion>
