<accordion name="collapse-property">

    <div slot="title" class="ll-head">
        PROPERTY
    </div>

    <frgroup>
        <label slot="label">
            Tipe
        </label>
        <lease-types></lease-types>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Lokasi
        </label>
        <input type="text" name="prop_name" value="{{ old('prop_name') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Alamat
        </label>
        <input type="text" name="prop_addr" value="{{ old('prop_addr') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Luas Tanah
        </label>
        <div class="input-group">
            <money class="form-control" name="prop_land_area" v-model="landArea" v-bind="{prefix:'',precision:0,thousands:'.'}"></money>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Luas Bangunan
        </label>
        <div class="input-group">
            <money class="form-control" name="prop_building_area" v-model="buildingArea" v-bind="{prefix:'',precision:0,thousands:'.'}"></money>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Blok/Tower
        </label>
        <input type="text" name="prop_block" value="{{ old('prop_block') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Lantai
        </label>
        <input type="text" name="prop_floor" value="{{ old('prop_floor') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Unit
        </label>
        <input type="text" name="prop_unit" value="{{ old('prop_unit') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Listrik
        </label>
        <input type="text" name="prop_electricity" value="{{ old('prop_electricity') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Air
        </label>
        <input type="text" name="prop_water" value="{{ old('prop_water') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Telepon
        </label>
        <input type="text" name="prop_telephone" value="{{ old('prop_telephone') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>

    <!-- PRICE -->
    @include('partials.forms.lease.property_price')

</accordion>
