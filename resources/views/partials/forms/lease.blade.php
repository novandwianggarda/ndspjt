<div class="box box-solid">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="box-group" id="accordion">
                <div class="panel box box-success">
                    <!-- accordions -->
                    <div class="box-header with-border">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-one">
                            <h4 class="box-title">
                                LAND
                            </h4>
                        </a>
                    </div>
                    <div id="collapse-one" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Certificate(s)
                                </label>
                                <div class="col-sm-10">
                                    <select id="multiple-certs" class="form-control" name="cert_ids[]" multiple="multiple">
                                        <option value="0">Option</option>
                                    </select>
                                </div>
                            </div>
                            <div id="cert-result">

                            </div>
                        </div>
                    </div>
                    <!-- ./collapse-one -->
                    <div class="box-header with-border">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-two">
                            <h4 class="box-title">
                                YYY
                            </h4>
                        </a>
                    </div>
                    <div id="collapse-two" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputEmail3" placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputPassword3" placeholder="Password" type="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./collapse-two -->
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
