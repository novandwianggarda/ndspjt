<accordion name="collapse-outstanding" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        OTHER INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Jaminan
        </label>
        <div>Rp.
        	<?php 

        		$jaminan = $lease->rent_assurance;
        		echo number_format((float)$jaminan, 0, ".", ".")."<br />";
        	?>
        </div>    
    </frgroup>	
    <frgroup>
        <label slot="label">
           Keterangan
        </label>
        <div>{!! $lease->note !!}</div>
    </frgroup>


</accordion>
