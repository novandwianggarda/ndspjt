<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <frgroup>
        {!! Form::label('lessor', 'Yang Menyewakan', ['slot'=>'label']) !!}
        {!! Form::text('lessor', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('lessor')?$errors->first('lessor'):'' !!}
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
        {!! Form::label('tenant', 'Nama Penyewa', ['slot'=>'label']) !!}
        {!! Form::text('tenant', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('tenant')?$errors->first('tenant'):'' !!}
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
        {!! Form::label('purpose', 'Keperluan Sewa', ['slot'=>'label']) !!}
        {!! Form::text('purpose', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('purpose')?$errors->first('purpose'):'' !!}
    </frgroup>

    <frgroup>
        {!! Form::label('pic', 'PIC', ['slot'=>'label']) !!}
        {!! Form::text('pic', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('pic')?$errors->first('pic'):'' !!}
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
