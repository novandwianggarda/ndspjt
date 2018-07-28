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
                Tax Name
            </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" disabled="disabled" option value="PBB" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Year
            </label>
            <div class="col-sm-10">
                <select id="year" class="form-control" name="year"></select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Certificate
            </label>
            <certificate-types></certificate-types>
            <div class="col-sm-10">
                
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nilai Pajak
            </label>
            <div class="col-sm-5">
                <input type="number" name="nop" value="{{ old('nop') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">
                Wajib Pajak
            </label>
            <div class="col-sm-5">
                <input type="number" min="0" name="area" value="{{ old('area') }}" class="form-control" />

            </div>   
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                PT Penanggung
            </label>
            <div class="col-sm-10">
                <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
            </div>
        </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">
                Payment
            </label>
            <div class="col-sm-10">
                <input type="text" name="addr_address" value="{{ old('addr_address') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                NOP
            </label>
            <div class="col-sm-10">
                <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Due Date
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
