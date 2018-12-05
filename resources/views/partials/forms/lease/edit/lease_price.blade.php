<accordion name="collapse-lease-price" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE PRICE
    </div>

    <frgroup>
        <label slot="label">
            Sewa <span v-text="periodType"></span> (DPP)
        </label>

        {!! Form::text('rent_price', null, ['class'=>'form-control', 'v-model'=>'rentPrice', 'Placeholder'=>'Rp. 0']) !!}
        {!! $errors->has('rent_price')?$errors->first('rent_price'):'' !!}

    </frgroup>


    <frgroup>
        {!! Form::label('rent_assurance', 'Jaminan', ['slot'=>'label']) !!}
        {!! Form::text('rent_assurance', null, ['class'=>'form-control', 'Placeholder'=>'Rp. 0']) !!}
                        {!! $errors->has('rent_assurance')?$errors->first('rent_assurance'):'' !!}
    </frgroup>


    <frgroup>
        <label slot="label">
            Total Sewa
        </label>
        <money class="form-control" v-bind:value="rentPriceTotal" disabled></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Total PPh
        </label>
        <money class="form-control" v-bind:value="rentPricePPH" disabled></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Total PPN
        </label>
        <money class="form-control" v-bind:value="rentPricePPN" disabled></money>
    </frgroup>

    <frgroup>
        <label slot="label">
            Total Sewa + PPN
        </label>
        <money class="form-control" v-bind:value="rentPriceTotalWithPPN" disabled></money>
    </frgroup>

</accordion>
