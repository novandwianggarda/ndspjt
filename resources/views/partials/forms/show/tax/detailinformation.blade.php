<accordion name="collapse-taxdet">

    <div slot="title" class="ll-head">
        PBB INFORMATION
    </div>

    <frgroup>
        <label slot="label">
           NOP
        </label>
        <div>{{$tax->nop}}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Folder PBB Kini
        </label>
        <div>{{$tax->folder_pbb}}</div>
        
    </frgroup>

    <frgroup>
        <label slot="label">
           Penanggung PBB
        </label>
        <div>{{$tax->pen_pbb}}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
           Wajib Pajak
        </label>
        <div>{{$tax->wajib_pajak}}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
           Letak Objek Pajak
        </label>
        <div>{{$tax->letak_objek_pajak}}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Kelurahan PBB
        </label>
        <div>{{$tax->kelurahan_pbb}}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Kota PBB
        </label>
        <div>{{$tax->kota_pbb}}</div>
    </frgroup>
    <frgroup>
        <label slot="label">
            Luas Tanah PBB
        </label>
        <div>{{$tax->luas_tanah_pbb}}</div>
    </frgroup>
    <frgroup>
        <label slot="label">
           Luas Bangun PBB
        </label>
        <div>{{$tax->luas_bangun_pbb}}</div>
    </frgroup>
</accordion>