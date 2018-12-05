<accordion name="collapse-outstanding" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        OTHER INFORMATION
    </div>

    {{-- <frgroup>
        <label slot="label">
            Jaminan
        </label>
        <money name="rent_assurance" class="form-control" v-bind:value="rentAssurance"></money>
    </frgroup> --}}

    <frgroup>
        <label slot="label">
            Sewa /bulan/m<sup>2</sup>
        </label>
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6">
                <select name="rent_monthly_type" v-model="rentMonthlyM2Type" class="form-control">
                    <option value="building" selected>by Building</option>
                    <option value="land">by Land</option>
                </select>
            </div>
            <div class="col-md-10 col-sm-8 col-xs-6">
                <money class="form-control col-md-6" v-bind:value="rentPriceMonthlyM2" disabled></money>
            </div>
        </div>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup>
        <label slot="label">
            Pendapatan /Tahun Setelah PPh &amp; Fee Broker
        </label>
        <money class="form-control" v-bind:value="rentIncomeTotal" disabled></money>
    </frgroup>



    <frgroup>
        <label slot="label">
            Keterangan
        </label>

            {!! Form::textArea('note', null, [ 'id'=>'editor1', 'class'=>'form-control', 'rows' => '5', 'cols' => '30']) !!}
            {!! $errors->has('note')?$errors->first('note'):'' !!}
    </frgroup>

</accordion>
