<accordion name="collapse-taxtahun">

    <div slot="title" class="ll-head">
        PBB Tahun
    </div>

    <frgroup>
        <label slot="label">
            Tahun
        </label>
        <input type="text" name="year" value="{{ old('year') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            NJOP Tanah
        </label>
        <input type="text" name="njop_land" value="{{ old('njop_land') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            NJOP Bangunan
        </label>
        <input type="text" name="njop_building" value="{{ old('njop_building') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            NJOP Total
        </label>
        <input type="text" name="njop_total" value="{{ old('njop_total') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            PTKP
        </label>
        <input type="text" name="ptkp" value="{{ old('ptkp') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Stimulus
        </label>
        <input type="text" name="stimulus" value="{{ old('stimulus') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            PBB yang Harus dibayar
        </label>
        <input type="text" name="pbbygdbyr" value="{{ old('pbbygdbyr') }}" class="form-control" />
    </frgroup>

</accordion>