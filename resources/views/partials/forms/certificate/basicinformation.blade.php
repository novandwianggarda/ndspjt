<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-property" href="#collapse-property">
        <h4 class="box-title ll-head">
            BASIC INFORMATION
        </h4>
    </a>
</div>
<div id="collapse-property" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Tipe Sertifikat
            </label>
            <certificate-types></certificate-types>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nomor Sertifikat
            </label>
            <div class="col-sm-10">
                <input type="text" name="number" value="{{ old('number') }}" class="form-control" placeholder="Contoh: 1, 2, 3" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nama Sertifikat
            </label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ old('name ') }}" class="form-control" placeholder="Contoh: PT. Dirga Surya" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                NOP
            </label>
            <div class="col-sm-10">
                <input type="text" name="nop" value="{{ old('nop') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">
                Luas Sertifikat
            </label>
            <div class="col-sm-5">
                <div class="input-group">
                    <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" placeholder="Contoh: 1, 2, 3" />
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>   
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Kelurahan
            </label>
            <div class="col-sm-2">
                <input type="text" name="addr_village" value="{{ old('addr_village') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Kecamatan
            </label>
            <div class="col-sm-2">
                <input type="text" name="addr_district" value="{{ old('addr_district') }}" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">
                Kota / Kabupaten
            </label>
            <div class="col-sm-2">
                <input type="text" name="addr_city" value="{{ old('addr_city') }}" class="form-control" />
            </div>
        </div>
        
            <div class="form-group">
            <label class="col-sm-2 control-label">
                Alamat
            </label>
            <div class="col-sm-10">
                <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Kepemilikan Sertifikat
            </label>
            <div class="col-sm-10">
                <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Publish Date
            </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                <input type="text" name="name" value="{{ old('name ') }}" class="form-control pull-right datepicker" />
                </div>
            </div>
        </div>    
        </div>
    </div>
</div>
