<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <frgroup>
        <label slot="label">
            Yang Menyewakan
        </label>
        <input type="text" name="lessor" value="{{ old('lessor') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            PKP Yang Menyewakan
        </label>
        <div class="input-group">
            <label class="radio-inline"><input type="radio" name="lessor_pkp" v-model="lessorPKP" :value="true">Ya</label>
            <label class="radio-inline"><input type="radio" name="lessor_pkp" v-model="lessorPKP" :value="false">Tidak</label>
            <label class="radio-inline text-muted">
                <i class="fa fa-info-circle"></i>
                <span v-if="lessorPKP">Termasuk PPN</span>
                <span v-else>Tanpa PPN</span>
            </label>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Penyewa
        </label>
        <input type="text" name="tenant" value="{{ old('tenant') }}" class="form-control" />
    </frgroup>

    <frgroup>
            <label slot="label">
                Jaminan Asuransi
            </label>
            <money name="rent_assurance" class="form-control" value="{{ old('rent_assurance') }}"></money>
    </frgroup>

    <frgroup wl="2">
        <label slot="label">
            Tipe Penyewa
        </label>
        <div>
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <select name="tenant_type" class="form-control" v-model="tenantType">
                        <option value="personal" selected>Perorangan</option>
                        <option value="organization">Badan</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-muted" style="padding-top:5px;">
                    <i class="fa fa-info-circle"></i>
                    <span v-if="tenantType === 'personal'">Termasuk PPh</span>
                    <span v-else>Tanpa PPh</span>
                </div>
            </div>
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

    <!-- AGREEMENT -->
    @include('partials.forms.lease.agreement')

    <!-- GRACE PERIOD -->
    @include('partials.forms.lease.grace')

    <!-- LEASE PERIOD -->
    @include('partials.forms.lease.lease_period')

    <!-- LEASE PRICE -->
    @include('partials.forms.lease.lease_price')

    <!-- PAYMENT TERMS-->
    @include('partials.forms.lease.payment_term')

    <!-- INVOICE -->
    @include('partials.forms.lease.payment_invoice')

    <!-- PAYMENT HISTORY -->
    @include('partials.forms.lease.payment_history')

    <!-- BROKER -->
    @include('partials.forms.lease.broker')

    <!-- OTHER -->
    @include('partials.forms.lease.other')

</div>

</accordion>
