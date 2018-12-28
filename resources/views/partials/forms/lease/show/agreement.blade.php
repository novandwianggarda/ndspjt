<accordion name="collapse-lease-agreement" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE AGREEMENT
    </div>


    <div class="col-md-12">
        <table style="width:100%">
          <tr>
            <th>Nama Notaris</th>
            <th>No Akta Sewa</th>
            <th>Tanggal Akta Sewa</th>
            <th>Grace Awal</th>
            <th>Grace Akhir</th>
          </tr>
          <tr>
            <td>{{ $lease->lease_deed }}</td>
            <td>{{ $lease->lease_number }}</td>
            <td>
                <?php 
                if($lease->lease_deed_date==null){
                    $tang='';
                }else{ 
                $tgl=strtotime($lease->lease_deed_date);
                $tang=date("d F Y", $tgl);
                }
                ?>
                {{@$tang}}
            </td>
            <td>
                <?php 
                if($lease->grace_start==null){
                    $start='';
                }else{ 
                $tgl=strtotime($lease->grace_start);
                $start=date("d F Y", $tgl);
                }
                ?>
                {{@$start}}
            </td>
            <td>
                <?php 
                if($lease->grace_end==null){
                    $ends='';
                }else{ 
                $tgl=strtotime($lease->grace_end);
                $ends=date("d F Y", $tgl);
                }
                ?>
                {{@$ends}}
            </td>
          </tr>
        </table>
    </div>



    <!-- <frgroup>
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
    </frgroup> -->



</accordion>
