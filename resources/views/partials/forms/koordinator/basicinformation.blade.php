<accordion name="collapse-properties" collapse="in">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>
    <frgroup>
        <label slot="label">
            Nama
        </label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Alamat
        </label>
        <input type="text" name="address" value="{{ old('address') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Kabupaten / Kota
        </label>
        <input type="text" name="kabkot" value="{{ old('kabkot') }}" class="form-control" />
    </frgroup>


    <frgroup wl="2" wi="4">
        <label slot="label">
            Tps
        </label>
        <input type="text" name="tps" value="{{ old('tps') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Telephone
        </label>
        <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>


   
</accordion>