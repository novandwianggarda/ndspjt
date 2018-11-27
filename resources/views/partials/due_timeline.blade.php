<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title"><i class="fa fa-money" style="color:red"></i>
 &nbsp; Due Lease</h2>
    </div>
    <br>
    <!-- /.box-header -->
    @foreach ($leases as $le)
    <div class="box-body">
        <ul class="timeline">
            <li>
                <i class="fa fa-clock-o ll-acolor"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header no-border">
                        <a href="/leases/show/{{ $le->id }}">{{ $le->lessor }}</a>
                    </h3>
                    <span>Tenant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $le->tenant }}</span> <br>
                    <?php 
                        if($le->start==null){
                            $starts='';
                        }else{ 
                            $tgl=strtotime($le->start);
                            $starts=date("d F Y", $tgl);
                        }
                    ?>

                    <span>Start&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{@$starts}}</span><br> 
                    

                    

                    <span>
                        <?php 
                        if($le->end==null){
                            $tang='';
                        }else{ 
                            $tgl=strtotime($le->end);
                            $tang=date("d F Y", $tgl);
                        }
                        ?>
                        
                        End Date  &nbsp;&nbsp;: {{@$tang}}
                    </span>

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
    @endforeach
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="" class="uppercase">View All</a>
    </div>
    <!-- /.box-footer -->
</div>
