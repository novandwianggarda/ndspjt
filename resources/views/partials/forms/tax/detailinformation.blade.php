<accordion name="collapse-taxdetail">

    <div slot="title" class="ll-head">
        PBB INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Folder PBB Kini
        </label>
        <input type="text" name="folder_pbb" value="{{ old('folder_pbb') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Rencana Group Folder PBB
        </label>
        <input type="text" name="rencana_group" value="{{ old('rencana_group') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Penanggung PBB
        </label>
        <input type="text" name="pen_pbb" value="{{ old('pen_pbb') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            NOP
        </label>
        <input type="text" name="nop" value="{{ old('nop') }}" class="form-control" />
    </frgroup>

     <frgroup>
        <label slot="label">
            Wajib Pajak
        </label>
        <input type="text" name="wajib_pajak" value="{{ old('wajib_pajak') }}" class="form-control" />
    </frgroup>

     <frgroup>
        <label slot="label">
           Letak Objek Pajak
        </label>
        <input type="text" name="letak_objek_pajak" value="{{ old('letak_objek_pajak') }}" class="form-control" />
    </frgroup>

     <frgroup>
        <label slot="label">
            Kelurahan PBB
        </label>
        <input type="text" name="kelurahan_pbb" value="{{ old('kelurahan_pbb') }}" class="form-control" />
    </frgroup>
    
    <frgroup>
        <label slot="label">
            Kota PBB
        </label>
        <input type="text" name="kota_pbb" value="{{ old('kota_pbb') }}" class="form-control" />
    </frgroup>
    

    <frgroup>
        <label slot="label">
            Luas Tanah PBB
        </label>
        <input type="text" name="luas_tanah_pbb" value="{{ old('luas_tanah_pbb') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Luas Bangun PBB
        </label>
        <input type="text" name="luas_bangun_pbb" value="{{ old('luas_bangun_pbb') }}" class="form-control" />
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