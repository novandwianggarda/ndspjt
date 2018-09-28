<accordion name="collapse-certificate" collapse="in">
        <div slot="title" class="ll-head">
            BASIC INFORMATION
        </div>
        

        <frgroup>
            <label slot="label">
                Kepemilikan
            </label>
            <input type="text" name="kepemilikan" value="{{ old('kepemilikan') }}" class="form-control" placeholder="Kepemilikan" />
        </frgroup>
        <frgroup>
            <label slot="label">
                Purposes
            </label>
            <input type="text" name="purposes" value="{{ old('purposes') }}" class="form-control" placeholder="purposes" />
        </frgroup>
        <frgroup>
            <label slot="label">
                Archive
            </label>
            <input type="text" name="archive" value="{{ old('archive') }}" class="form-control" placeholder="Archive" />
        </frgroup>

        <frgroup>
            <label slot="label">
                No HM / HGB
            </label>
            <input type="text" name="no_hm_hgb" value="{{ old('no_hm_hgb') }}" class="form-control" placeholder="No HM / HGB" />
        </frgroup>

        <frgroup>
            <label slot="label">
                Nama Sertifikat
            </label>
            <input type="text" name="nama_sertifikat" value="{{ old('nama_sertifikat') }}" class="form-control" placeholder="Contoh: PT. Dirga Surya" />
        </frgroup>
       

        <frgroup>
            <label slot="label">
                Tipe Sertifikat
            </label>
            <certificate-types></certificate-types>
        </frgroup>


        <frgroup w="2" wi="2">
            <label slot="label">
                Kelurahan
            </label>
            <input type="text" name="kelurahan" value="{{ old('kelurahan') }}" class="form-control" />
        </frgroup>

        <frgroup wl="2" wi="2">
            <label slot="label">
                Kecamatan
            </label>
            <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="form-control" />
        </frgroup>

        <frgroup wl="2" wi="2">
            <label slot="label">
                Kota / Kabupaten
            </label>
            <input type="text" name="kota" value="{{ old('kota') }}" class="form-control" />
        </frgroup>
        
        <frgroup>
            <label slot="label">
                Alamat
            </label>
            <input type="text" name="addrees" value="{{ old('addrees') }}" class="form-control" />
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
                    <input type="number" min="0" name="luas_sertifikat" value="{{ old('luas_sertifikat') }}" class="form-control" placeholder="Contoh: 1, 2, 3" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
        </frgroup>



        <frgroup>
            <label slot="label">
                Publish Date
            </label>
            <indate name="published_date" value="{{old('published_date') }}"></indate>
        </frgroup>
        <frgroup>
            <label slot="label">
                Expired Date HGB
            </label>
            <indate name="expired_date" value="{{old('expired_date') }}"></indate>
        </frgroup>
</accordion>
