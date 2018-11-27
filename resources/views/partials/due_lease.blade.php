<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title"><i class="fa fa-money" style="color:red"></i>
 &nbsp; Reminder Due Lease</h2>
    </div>
    <br>
    <!-- /.box-header -->
    @foreach ($lease as $le)
    <div class="box-body">
        <ul class="timeline">
            <li>
                <i class="fa fa-clock-o ll-acolor"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header no-border">
                        <a href="/leases/show/{{ $le->id }}">{{ $le->lessor }}</a>
                    </h3>
                    <span>Tenant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $le->tenant }}</span> <br>
                    

                    <span>
                        <?php 
                        if($le->due_date==null){
                            $tang='';
                        }else{ 
                            $tgl=strtotime($le->due_date);
                            $tang=date("d F Y", $tgl);
                        }
                        ?>
                        
                        Due Date &nbsp;&nbsp;: {{@$tang}}
                    </span>

                </div>
            </li>
        </ul>
    </div>
    @endforeach
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="" class="uppercase">View All</a>
    </div>
    <!-- /.box-footer -->
</div>
