<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-grace" href="#collapse-four">
        <h4 class="box-title ll-sub-head">
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
                <input class="form-control pull-right datepicker" type="text" name="grace_start" v-model="graceStart">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Grace Akhir</label>
            <div class="input-group date col-sm-10">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control pull-right datepicker" type="text" name="grace_end" v-model="graceEnd">
            </div>
        </div>
        <div class="form-group" v-show="gracePeriod !== 'NaN'">
                <label class="col-sm-2 control-label">Grace Total</label>
                <label class="col-sm-2 label-2" v-text="gracePeriod + ' Month'"></label>
            </div>
        </div>
    </div>
</div>
