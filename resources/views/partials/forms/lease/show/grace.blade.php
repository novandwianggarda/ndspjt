<accordion name="collapse-grace" v-bind:sub="true" style="margin-bottom:10px;" collapse="in">

    <div slot="title" class="ll-head-2">
        GRACE PERIOD
    </div>
    <frgroup>
        <label slot="label">
            Grace Awal
        </label>
        <div>
            :
            <?php 
                if($lease->grace_start==null){
                    $tang='';
                }else{ 
                $tgl=strtotime($lease->grace_start);
                $tang=date("d F Y", $tgl);
                }
            ?>
            {{@$tang}}
        </div>
    </frgroup>
    <frgroup>
        <label slot="label">
            Grace Akhir
        </label>
        <div>
            :
            <?php 
                if($lease->grace_end==null){
                    $ends='';
                }else{ 
                $tgl=strtotime($lease->grace_end);
                $ends=date("d F Y", $tgl);
                }
            ?>
            {{@$ends}}
        </div>
    </frgroup>

    <div class="clearfix"></div>

</accordion>
