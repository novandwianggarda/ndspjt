<div class="box-header with-border">
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
