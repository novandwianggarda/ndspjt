<accordion name="collapse-taxinfo">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Tax Name
        </label>
<!--         <input type="text" name="tax_type_id" class="form-control" disabled="disabled" option value="PBB"  /> -->
        <input type="text" name="tax_type_id" value="{{ old('tax_type_id') }}" class="form-control" />

    </frgroup>

    <frgroup>
        <label slot="label">
            Year
        </label>
        <select id="year" class="form-control" name="year">
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
        </select>
    </frgroup>

    <frgroup>
        <label slot="label">
            Certificate
        </label>
        <!-- <certificate-types></certificate-types> -->
        <input type="number" name="certificate_ids" value="{{ old('certificate_ids') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Nilai Pajak
        </label>
        <input type="number" name="nominal_ly" value="{{ old('nominal_ly') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Due Date
        </label>
        <indate name="due_date" value="{{ old('due_date') }}"></indate>
    </frgroup>

    <frgroup>
        <label slot="label">
            Wajib Pajak
        </label>
        <input type="text" name="owner" value="{{ old('owner')}}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            PT. Penanggung    
        </label>
        <input type="text" name="corp_name" value="{{ old('corp_name') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Payment
        </label>
        <input type="text" name="corp_payment_method" value="{{ old('corp_payment_method') }}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            NOP
        </label>
        <input type="text" name="nop" vallue="{{ old('nop') }}" class="form-control"/>
    </frgroup>

</accordion>