<accordion name="collapse-lease-period" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE PERIOD
    </div>


     <frgroup  wl="2" wi="4">
        <label slot="label">
            Awal Sewa &nbsp; :
        </label>
        <div>
            <?php 
                if($lease->start==null){
                    $tang='';
                }else{ 
                $tgl=strtotime($lease->start);
                $tang=date("d F Y", $tgl);
                }
            ?>
            {{@$tang}}
        </div>
    </frgroup>
    <frgroup  wl="2" wi="4">
        <label slot="label">
            Akhir Sewa &nbsp; :
        </label>
        <div>
            <?php 
                if($lease->end==null){
                    $ends='';
                }else{ 
                $tgl=strtotime($lease->end);
                $ends=date("d F Y", $tgl);
                }
            ?>
            {{@$ends}}
        </div>
    </frgroup>

    <div class="clearfix"></div>

</accordion>
