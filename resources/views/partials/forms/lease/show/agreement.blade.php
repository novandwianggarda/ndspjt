<accordion name="collapse-lease-agreement" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        LEASE AGREEMENT
    </div>

    <frgroup>
        <label slot="label">
           Nama Notaris
        </label>
        <div>: &nbsp;{{ $lease->lease_deed }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
           No Akta Sewa
        </label>
        <div>: &nbsp;{{ $lease->lease_number }}
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
           Tanggal Akta Sewa
        </label>

        <div>:
            <?php 
                if($lease->lease_deed_date==null){
                    $tang='';
                }else{ 
                $tgl=strtotime($lease->lease_deed_date);
                $tang=date("d F Y", $tgl);
                }
            ?>
            {{@$tang}}
        </div>
    </frgroup>



</accordion>
