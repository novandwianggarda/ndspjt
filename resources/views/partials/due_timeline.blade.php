<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Due Leases</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="timeline">
            <li>
                <i class="fa fa-clock-o ll-acolor"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header no-border">
                        <a href="#">{{ $le->lessor }}</a>
                    </h3>
                    <span>Tenant&nbsp;: {{ $le->tenant }}</span> <br>
                    <?php 
                      $tgl=strtotime($le->end);
                      $tanggal=date("d F Y", $tgl); //d F y adalah tgl bulan thn
                    ?>
                    <span>Due &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $tanggal }}</span> 
                </div>
            </li>
            
            <!-- <li>
                <i class="fa fa-clock-o ll-acolor"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header no-border">
                        <a href="#">Title Goes Here</a>
                    </h3>
                    <span>Tenant: XXXX</span> <br>
                    <span>Due: 1 Feb. 2014</span>
                </div>
            </li> -->
        </ul>

    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="/lease/{{ $le->id }}" class="uppercase">View All</a>
    </div>
    <!-- /.box-footer -->
</div>
