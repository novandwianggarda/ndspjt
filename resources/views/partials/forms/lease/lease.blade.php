<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-lease" href="#collapse-lease">
        <h4 class="box-title ll-head">
            LEASE
        </h4>
    </a>
</div>
<div id="collapse-lease" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Yang Menyewakan
            </label>
            <div class="col-sm-10">
                <input type="text" name="lessor" value="{{ old('lessor') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nama Penyewa
            </label>
            <div class="col-sm-10">
                <input type="text" name="tenant" value="{{ old('tenant') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Keperluan Sewa
            </label>
            <div class="col-sm-10">
                <input type="text" name="purpose" value="{{ old('purpose') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                PIC
            </label>
            <div class="col-sm-10">
                <input type="text" name="pic" value="{{ old('pic') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Awal Sewa
            </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control pull-right datepicker" type="text" name="start" value="{{ old('start') }}">
                </div>
            </div>
            <label class="col-sm-2 control-label">
                Akhir Sewa
            </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control pull-right datepicker" type="text" name="end" value="{{ old('end') }}">
                </div>
            </div>
        </div>
        <div class="form-group" v-show="duration !== 0">
            <label class="col-sm-2 control-label">
                Masa Sewa
            </label>
            <label class="col-sm-2 label-2" v-text="duration + ' Year'"></label>
        </div>
    </div>
    <!-- BROKER -->
    @include('partials.forms.lease.broker')
    <!-- GRACE -->
    @include('partials.forms.lease.grace')
</div>
