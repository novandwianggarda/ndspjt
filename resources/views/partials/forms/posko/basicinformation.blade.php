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
            Lokasi
        </label>
        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Penanggung Jawab
        </label>
        <input type="text" name="penjwb" value="{{ old('penjwb') }}" class="form-control" />
    </frgroup>

     <frgroup>
        <label slot="label">
            Jumlah Dpt
        </label>
        <input type="text" name="jmlh_dpt" value="{{ old('jmlh_dpt') }}" class="form-control" />
    </frgroup>


    <div class="clearfix"></div>


   
</accordion>