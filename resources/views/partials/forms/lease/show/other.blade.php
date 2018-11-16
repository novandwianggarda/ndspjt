<accordion name="collapse-outstanding" v-bind:sub="true">

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
        		echo number_format($jaminan, 0, ".", ".")."<br />";
        	?>
        </div>    
    </frgroup>	
    <frgroup>
        <label slot="label">
           Keterangan
        </label>
        <div>{{ $lease->note }}</div>
    </frgroup>


</accordion>
