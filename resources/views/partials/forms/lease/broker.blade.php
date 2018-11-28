<accordion name="collapse-broker" v-bind:sub="true" collapse="in">

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
        {!! Form::text('brok_fee_yearly', null, ['class'=>'form-control', 'v-model'=>'brokFeeYearly', 'Placeholder'=>'Rp. 0']) !!}
        {!! $errors->has('brok_fee_yearly')?$errors->first('brok_fee_yearly'):'' !!}
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee Total
        </label>
        <money v-bind:value="brokFeeTotal" disabled="disabled" class="form-control"></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee Payment
        </label>
        {!! Form::text('brok_fee_paid', null, ['class'=>'form-control', 'Placeholder'=>'Rp. 0']) !!}
        {!! $errors->has('brok_fee_paid')?$errors->first('brok_fee_paid'):'' !!}

    </frgroup>

</accordion>
