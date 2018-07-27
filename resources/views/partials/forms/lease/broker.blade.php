<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-broker" href="#collapse-broker">
        <h4 class="box-title ll-sub-head">
            BROKER
        </h4>
    </a>
</div>
<div id="collapse-broker" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Nama Broker
            </label>
            <div class="col-sm-10">
                <input type="text" name="brok_name" value="{{ old('brok_name') }}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Fee per Tahun
            </label>
            <div class="col-sm-10">
                <money name="brok_fee_yearly" v-model="brokFeeYearly" class="form-control"></money>
            </div>
        </div>
        <div class="form-group" v-show="brokFeeTotal !== 0">
            <label class="col-sm-2 control-label">
                Fee Total
            </label>
            <div class="col-sm-10">
                <money id="brok-fee-total" v-bind:value="brokFeeTotal" class="form-control" disabled="disabled"></money>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                Fee Terbayar
            </label>
            <div class="col-sm-10">
                <money name="brok_fee_paid" value="{{ old('brok_fee_paid') }}" class="form-control"></money>
            </div>
        </div>
    </div>
</div>
