<accordion name="collapse-property">

    <div slot="title" class="ll-head">
        PROPERTY
    </div>

    <frgroup wl="2" wi="4">
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
    </frgroup>
    <div class="clearfix"></div>

    <!-- PRICE -->
    @include('partials.forms.lease.show.property_price')

</accordion>
