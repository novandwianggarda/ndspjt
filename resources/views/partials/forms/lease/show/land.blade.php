 <accordion name="collapse-land" collapse="in" >

    <div slot="title" class="ll-head">
        LAND
    </div>

    <frgroup>
        <label slot="label">
           Nama Sertifikat
        </label>
        <div>: &nbsp;{{ $lease->cert->nama_sertifikat }}</div>
    </frgroup>
    <frgroup>
        <label slot="label">
           No Hm/ Hgb
        </label>
        <div>: &nbsp;{{ $lease->cert->no_hm_hgb }}</div>
        
    </frgroup>
    <frgroup>
        <label slot="label">
           Kota
        </label>
        <div>: &nbsp;{{ $lease->cert->kota }}</div>
        
    </frgroup>
    <frgroup>
        <label slot="label">
           Kecamatan
        </label>
        <div>: &nbsp;{{ $lease->cert->kecamatan }}</div>
        
    </frgroup>
    <frgroup>
        <label slot="label">
           Pemilik
        </label>
        <div>: &nbsp;{{ $lease->cert->kepemilikan }}</div>
        
    </frgroup>

</accordion>

