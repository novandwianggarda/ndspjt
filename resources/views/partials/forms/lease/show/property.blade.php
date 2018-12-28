<accordion name="collapse-property" collapse="in">

    <div slot="title" class="ll-head">
        PROPERTY
    </div>

    <div class="col-md-12">
        <table style="width:100%">
          <tr>
            <th>Nama Area</th>
            <th>Alamat</th>
            <th>Listrik</th>
            <th>Air</th>
            <th>Land Area</th>
            <th>Block</th>
          </tr>
          <tr>
            <td>{{ $lease->prop->name }}</td>
            <td>{{ $lease->prop->address }}</td>
            <td>{{ $lease->prop->electricity }}</td>
            <td>{{ $lease->prop->water }}</td>
            <td>{{ $lease->prop->land_area }}</td>
            <td>{{ $lease->prop->block }}</td>
          </tr>
        </table>
    </div>



    <!-- <frgroup wl="2" wi="4">
        <label slot="label">
           Nama Area
        </label>
        <div>: &nbsp;{{ $lease->prop->name }}</div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
           Alamat
        </label>
        <div>: &nbsp;{{ $lease->prop->address }}</div>
    </frgroup>
    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
           Listrik
        </label>
        <div>: &nbsp;{{ $lease->prop->electricity }}</div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
           Air
        </label>
        <div>: &nbsp;{{ $lease->prop->water }}</div>
    </frgroup>
    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
           Land Area
        </label>
        <div>: &nbsp;{{ $lease->prop->land_area }}
        </div>
    </frgroup>


    <frgroup wl="2" wi="4">
        <label slot="label">
           Block
        </label>
        <div>: &nbsp;{{ $lease->prop->block }}
        </div>
    </frgroup> -->
    

</accordion>
