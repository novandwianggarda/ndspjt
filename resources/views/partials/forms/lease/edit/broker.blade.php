<!-- <accordion name="collapse-broker" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BROKER
    </div>

    <frgroup>
        {!! Form::label('brok_name', 'Nama Broker', ['slot'=>'label']) !!}
        {!! Form::text('brok_name', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('brok_name')?$errors->first('brok_name'):'' !!}
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee per Tahun
        </label>
        <money name="brok_fee_yearly" v-model="brokFeeYearly" class="form-control"></money>
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
        <money name="brok_fee_paid" value="{{ old('brok_fee_paid') }}" class="form-control"></money>
    </frgroup>

</accordion> -->



<accordion name="collapse-broker" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BROKER
    </div>


    <frgroup>
        {!! Form::label('brok_name', 'Nama Broker', ['slot'=>'label']) !!}
        {!! Form::text('brok_name', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('brok_name')?$errors->first('brok_name'):'' !!}
    </frgroup>

    <frgroup>
        <label slot="label">
            Fee Per Tahun
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

