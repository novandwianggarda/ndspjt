<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-four">
        <h4 class="box-title ll-head">
            GRACE
        </h4>
    </a>
</div>
<div id="collapse-four" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Grace Awal</label>
            <div class="input-group date col-sm-10">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control pull-right datepicker" type="text" name="grace_start">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Grace Akhir</label>
            <div class="input-group date col-sm-10">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control pull-right datepicker" type="text" name="grace_end">
            </div>
        </div>
        <div class="form-group" v-show="grace_period !== 0">
            <label class="col-sm-2 control-label">Grace Total</label>
            <div class="col-sm-10">
                <span id="grace-total"></span>
            </div>
        </div>
    </div>
</div>
