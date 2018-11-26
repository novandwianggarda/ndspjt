<accordion name="collapse-lease-price" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE PRICE
    </div>

    <frgroup>
        <label slot="label">
            Sewa Pertahun (DPP)
        </label>
        <div>:&nbsp;Rp.
            <?php 

                $jaminan = $lease->rent_price;
                echo number_format($jaminan, 0, ".", ".")."<br />";
            ?>
        </div>
    </frgroup>

</accordion>
