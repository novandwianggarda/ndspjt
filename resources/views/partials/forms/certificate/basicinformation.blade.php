<accordion name="collapse-certificate" collapse="in">
        <div slot="title" class="ll-head">
            BASIC INFORMATION
        </div>

        <frgroup>
            <label slot="label">
                Tipe Sertifikat
            </label>
            <certificate-types></certificate-types>
        </frgroup>

        <frgroup>
            <label slot="label">
                Nomor Sertifikat
            </label>
            <input type="text" name="number" value="{{ old('number') }}" class="form-control" placeholder="Contoh: 1, 2, 3" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Nama Sertifikat
            </label>
            <input type="text" name="name" value="{{ old('name ') }}" class="form-control" placeholder="Contoh: PT. Dirga Surya" />
        </frgroup>

        <frgroup>
            <label slot="label">
                NOP
            </label>
            <input type="text" name="nop" value="{{ old('nop') }}" class="form-control" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Luas Sertifikat
            </label>
            <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" placeholder="Contoh: 1, 2, 3" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
        </frgroup>

        <frgroup w="2" wi="2">
            <label slot="label">
                Kelurahan
            </label>
            <input type="text" name="addr_village" value="{{ old('addr_village') }}" class="form-control" />
        </frgroup>

        <frgroup wl="2" wi="2">
            <label slot="label">
                Kecamatan
            </label>
            <input type="text" name="addr_district" value="{{ old('addr_district') }}" class="form-control" />
        </frgroup>

        <frgroup wl="2" wi="2">
            <label slot="label">
                Kota / Kabupaten
            </label>
            <input type="text" name="addr_city" value="{{ old('addr_city') }}" class="form-control" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Alamat
            </label>
            <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Kepemilikan Sertifikat
            </label>
            <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Publish Date
            </label>
            <indate name="published_date" value="{{old('published_date') }}"></indate>
        </frgroup>
</accordion>
