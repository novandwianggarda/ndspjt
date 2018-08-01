<accordion name="collapse-taxinfo">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Tax Name
        </label>
        <input type="text" name=" " class="form-control" disabled="disabled" option value="PBB"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Year
        </label>
        <select id="year" class="form-control" name="year"></select>
    </frgroup>

    <frgroup>
        <label slot="label">
            Certificate
        </label>
        <certificate-types></certificate-types>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nilai Pajak
        </label>
        <input type="number" name="nominal_ly" value="{{ old('nominal_ly') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Wajib Pajak
        </label>
        <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" />
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

    <frgroup>
        <label slot="label">
            Due Date
        </label>
        <indate name="due_date" value="{{ old('due_date ') }}"></indate>
    </frgroup>

</accordion>