<accordion name="collapse-properties" collapse="in">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>
    <frgroup>
        <label slot="label">
            No KK
        </label>
        <input type="text" name="nokk" value="{{ old('nokk') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            NIK
        </label>
        <input type="text" name="nik" value="{{ old('nik') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Nama
        </label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Tempat Lahir
        </label>
        <input type="text" name="ttl" value="{{ old('ttl') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Tanggal Lahir
        </label>
        <input type="text" name="tgl" value="{{ old('tgl') }}" class="form-control" />
    </frgroup>


    <frgroup wl="2" wi="4">
        <label slot="label">
            Status Perkawinan
        </label>
        <input type="text" name="statusper" value="{{ old('statusper') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Jenis Kelamin
        </label>
        <input type="text" name="jkl" value="{{ old('jkl') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="2">
        <label slot="label">
            Jalan/Dukuh
        </label>
        <input type="text" name="jl" value="{{ old('jl') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="2">
        <label slot="label">
            RT
        </label>
        <input type="text" name="rt" value="{{ old('rt') }}" class="form-control" />
    </frgroup>
    <frgroup wl="2" wi="2">
        <label slot="label">
            RW
        </label>
        <input type="text" name="rw" value="{{ old('rw') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Jumlah Disabilitas
        </label>
        <input type="text" name="disabi" value="{{ old('disabi') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Keterangan
        </label>
        <input type="text" name="ket" value="{{ old('ket') }}" class="form-control" />
    </frgroup>


    <div class="clearfix"></div>


   
</accordion>