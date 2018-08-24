<accordion name="collapse-properties" collapse="in">

    <div slot="title" class="ll-head">
        BASIC INFORMATION
    </div>

        <frgroup>
        <label slot="label">
            Tipe
        </label>
        <property-types name="property_type_id"></property-types>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Lokasi
        </label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Alamat
        </label>
        <input type="text" name="address" value="{{ old('address') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Luas Tanah
        </label>
        <div class="input-group">
            <money class="form-control" name="land_area" v-model="landArea" v-bind="{prefix:'',precision:0,thousands:'.'}"></money>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Luas Bangunan
        </label>
        <div class="input-group">
            <money class="form-control" name="building_area" v-model="buildingArea" v-bind="{prefix:'',precision:0,thousands:'.'}"></money>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Blok/Tower
        </label>
        <input type="text" name="block" value="{{ old('block') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Lantai
        </label>
        <input type="text" name="floor" value="{{ old('floor') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Unit
        </label>
        <input type="text" name="unit" value="{{ old('unit') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Listrik
        </label>
        <input type="text" name="electricity" value="{{ old('electricity') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Air
        </label>
        <input type="text" name="water" value="{{ old('water') }}" class="form-control" />
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Telepon
        </label>
        <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control" />
    </frgroup>

    <div class="clearfix"></div>


   
</accordion>