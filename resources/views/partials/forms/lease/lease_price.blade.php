<div class="box-header with-border">
    <a data-toggle="collapse" data-parent="#accordion-lease-price" href="#collapse-lease-price">
        <h4 class="box-title ll-sub-head">
            PRICE
        </h4>
    </a>
</div>
<div id="collapse-lease-price" class="panel-collapse collapse">
    <div class="box-body">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Jaminan
                    </label>
                    <div class="col-sm-10">
                        <money name="rent_assurance" class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Sewa /m<sup>2</sup>/Bulan
                    </label>
                    <div class="col-sm-10">
                        <money name="rent_meterly_monthly" class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Sewa/Tahun (DPP)
                    </label>
                    <div class="col-sm-10">
                        <money name="rent_yearly" class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Total Sewa
                    </label>
                    <div class="col-sm-10">
                        <money class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Total PPN
                    </label>
                    <div class="col-sm-10">
                        <money class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Total Sewa + PPN
                    </label>
                    <div class="col-sm-10">
                        <money class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Service Charge + PPN per Bulan
                    </label>
                    <div class="col-sm-10">
                        <money class="form-control" :value="0"></money>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        Service Charge + PPN per m<sup>2</sup> per Bulan
                    </label>
                    <div class="col-sm-10">
                        <money class="form-control" :value="0"></money>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
