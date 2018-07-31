<accordion name="collapse-taxinfo">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Tax Name
        </label>
        <input type="text" name="name" class="form-control" disabled="disabled" option value="PBB"/>
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
        <input type="number" name="nop" value="{{ old('nop') }}" class="form-control" />
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
        <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Payment
        </label>
        <input type="text" name="add_address" value="{{ old('addr_address') }}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            NOP
        </label>
        <input type="text" name="owner" vallue="{{ old('owner') }}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Due Date
        </label>
        <indate name="name" value="{{ old('name ') }}"></indate>
    </frgroup>

</accordion>