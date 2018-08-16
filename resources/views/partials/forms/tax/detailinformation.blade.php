<accordion name="collapse-taxdetail">

    <div slot="title" class="ll-head">
        DETAIL INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Letak Objek Pajak
        </label>
        <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Kelurahan Objek Pajak
        </label>
        <input type="text" name="addr_village" value="{{ old('addr_village') }}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Luas Tanah PBB
        </label>
        <div class="input-group">
            <input type="number" name="addr_land_area" min="0" value="{{ old('addr_land_area')}}" class="form-control"/>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Luas Bangunan PBB
        </label>
        <div class="input-group">
            <input type="number" name="addr_building_area" min="0" value="{{ old('addr_building_area')}}" class="form-control"/>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            NJOP Total
        </label>
        <div class="input-group">
            <!-- <money name="njop_total" class="form-control" value="{{ old('njop_total')}}"></money> -->
            <input type="number" name="njop_total" min="0" value="{{ old('njop_total')}}" class="form-control"/>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            NJOP Bangunan
        </label>
        <div class="input-group">
            <!-- <money name="njop_building" class="form-control" value="{{ old('njop_building')}}"></money> -->
            <input type="number" name="njop_building" min="0" value="{{ old('njop_building')}}" class="form-control"/>
            <span class="input-group-addon">m<sup>2</sup></span>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Folder Sert. Kini
        </label>
        <input type="text" name="folder_current" value="{{ old('folder_current') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Rencana Folder Sert.
        </label>
        <input type="text" name="folder_plan" value="{{ old('addr_address') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            PBB 2017
        </label>
        <input type="text" name="" value="{{ old('') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Notes
        </label>
        <textarea type="text" name="note" value="{{ old('note')}}" class="form-control">  </textarea>
    </frgroup>
</accordion>

<!-- {{--<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-lease" href="#collapse-lease">
        <h4 class="box-title ll-head">
            DETAIL INFORMATION
        </h4>
    </a>
</div>
<div id="collapse-lease" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Letak Objek Pajak
            </label>
            <certificate-types></certificate-types>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                kelurahan Objek Pajak
            </label>
            <div class="col-sm-10">
                <input type="text" name="number" value="{{ old('number') }}" class="form-control"  />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Luas Tanah PBB
            </label>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>   
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Luas Bangunan PBB
            </label>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>   
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                NJOP T
            </label>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>   
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                NJOP B
            </label>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control"  />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>   
        </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">
                Folder Sert. Kini
            </label>
            <div class="col-sm-10">
                <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Rencana Folder Sert.
            </label>
            <div class="col-sm-10">
                <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">
                PBB 2017
            </label>
            <div class="col-sm-10">
                <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">
                Notes
            </label>
            <div class="col-sm-10">
                <textarea type="text" name="owner" class="form-control">  </textarea>
            </div>
        </div>

        </div>
    </div>
</div>
--}} -->