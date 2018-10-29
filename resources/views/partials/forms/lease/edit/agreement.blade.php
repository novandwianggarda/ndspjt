<accordion name="collapse-lease-agreement" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        LEASE AGREEMENT
    </div>

    <frgroup>
        {!! Form::label('lease_deed_notary', 'Nama Notaris', ['slot'=>'label']) !!}
        {!! Form::text('lease_deed_notary', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('lease_deed_notary')?$errors->first('lease_deed_notary'):'' !!}
    </frgroup>

    <frgroup>
        {!! Form::label('lease_deed_number', 'No Akta Sewa', ['slot'=>'label']) !!}
        {!! Form::text('lease_deed_number', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('lease_deed_number')?$errors->first('lease_deed_number'):'' !!}
    </frgroup>

    <frgroup>
        <label slot="label">
            Tanggal Akta Sewa
        </label>
        <indate name="lease_deed_date" bind-to="leaseDeedDate" v-bind:dateval="leaseDeedDate"></indate>
    </frgroup>

</accordion>
