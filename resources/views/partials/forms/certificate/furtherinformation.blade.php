<accordion name="collapse-information">
    <div slot="title" class="ll-head">
        FURTHER INFORMATION
    </div>
    
    <frgroup>
        <label slot="label">
                purposes
        </label>
        <input type="text" name="purposes" value="{{ old('purposes') }}" class="form-control" placeholder="Isikan purposes" />
    </frgroup>

    <frgroup>
        <label slot="label">
                Folder Sert. Kini
        </label>
        <input type="text" name="folder_sert" value="{{ old('folder_sert') }}" class="form-control" placeholder="Isikan Folder Sertifikat kini" />
    </frgroup>

    <frgroup>
        <label slot="label">
                No di Folder
        </label>
        <input type="text" name="no_folder" value="{{ old('no_folder') }}" class="form-control" placeholder="No di Folder" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Nominal AJB
        </label>
        <input type="text" name="ajb_nominal" value="{{old ('ajb_nominal')}}" class="form-control"/>
    </frgroup>

    <!-- <frgroup>
        <label slot="label">
            Tgl. AJB
        </label>
        <indate name="ajb_date" v-bind:dateval="{{old ('ajb_nominal')}}" class="datepicker"></indate>
    </frgroup> -->
     <frgroup>
        <label slot="label">
            Tgl. AJB
        </label>
        <indate name="ajb_date" value="{{old('ajb_date') }}"></indate>
    </frgroup>
    

    <frgroup>
        <label slot="label">
            Wajib Pajak
        </label>
        <input type="text" name="wajib_pajak" value="{{old ('wajib_pajak')}}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Letak Objek Pajak
        </label>
        <input type="text" name="letak_objek_pajak" value="{{old ('letak_objek_pajak')}}" class="form-control"/>
    </frgroup>
    <frgroup wl="2" wi="2">
        <label slot="label">
            Penanggung PBB
        </label>
        <input type="text" name="penanggung_pbb" value="{{old ('penanggung_pbb')}}" class="form-control"/>
    </frgroup>

     <frgroup w="2" wi="2">
        <label slot="label">
            Kelurahan PBB
        </label>
        <input type="text" name="kelurahan_pbb" value="{{old ('kelurahan_pbb')}}" class="form-control"/>
    </frgroup>

    <frgroup wl="2" wi="2">
            <label slot="label">
                Kota PBB
            </label>
            <input type="text" name="kota_pbb" value="{{ old('kota_pbb') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Luas Tanah PBB
        </label>
        <input type="text" name="luas_tanah_pbb" value="{{old ('luas_tanah_pbb')}}" class="form-control"/>
    </frgroup>
    <frgroup>
        <label slot="label">
            Luas Bangun PBB
        </label>
        <input type="text" name="luas_bangun_pbb" value="{{old ('luas_bangun_pbb')}}" class="form-control"/>
    </frgroup>

    

    

    <frgroup>
        <label slot="label">
            Keterangan
        </label>
        <input type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control" placeholder="Keterangan" />
    </frgroup>

</accordion>
