<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-property" href="#collapse-property">
        <h4 class="box-title ll-head">
            PROPERTY
        </h4>
    </a>
</div>
<div id="collapse-property" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Tipe
            </label>
            <lease-types></lease-types>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nama Lokasi
            </label>
            <div class="col-sm-10">
                <input type="text" name="prop_name" value="{{ old('prop_name') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Alamat
            </label>
            <div class="col-sm-10">
                <input type="text" name="prop_addr" value="{{ old('prop_addr') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Luas Tanah
            </label>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="number" min="0" name="prop_land_area" value="{{ old('prop_land_area') }}" class="form-control" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
            <label class="col-sm-2 control-label">
                Luas Bangunan
            </label>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="number" min="0" name="prop_building_area" value="{{ old('prop_building_area') }}" class="form-control" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Blok/Tower
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_block" value="{{ old('prop_block') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Lantai
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_floor" value="{{ old('prop_floor') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Unit
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_unit" value="{{ old('prop_unit') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Listrik
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_electricity" value="{{ old('prop_electricity') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Air
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_water" value="{{ old('prop_water') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Telp.
            </label>
            <div class="col-sm-2">
                <input type="text" name="prop_telephone" value="{{ old('prop_telephone') }}" class="form-control" />
            </div>
        </div>
    </div>
    <!-- PRICE -->
    @include('partials.forms.lease.property_price')
</div>
