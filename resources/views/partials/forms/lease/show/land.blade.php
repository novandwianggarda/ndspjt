 <accordion name="collapse-land" collapse="in" >

    <div slot="title" class="ll-head">
        LAND
    </div>
    <!-- <div class="col-md-12">
      <table style="width:100%">
      <tr>
        <th>Nama Sertifikat</th>
        <th>No Hm/ Hgb</th>
        <th>Kota</th>
        <th>Kecamatan</th>
        <th>Pemilik</th>
      </tr>
      <tr>
        <td>{{ $lease->cert->nama_sertifikat }}</td>
        <td>{{ $lease->cert->no_hm_hgb }}</td>
        <td>{{ $lease->cert->kota }}</td>
        <td>{{ $lease->cert->kecamatan }}</td>
        <td>{{ $lease->cert->kepemilikan }}</td>
      </tr>
    </table>  
    </div> -->

    <!-- PRICE -->

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

    <div class="clearfix"></div>
    @include('partials.forms.lease.show.property')
    

</accordion>

