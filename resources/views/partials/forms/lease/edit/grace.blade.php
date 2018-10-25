<accordion name="collapse-grace" v-bind:sub="true" style="margin-bottom:10px;">

    <div slot="title" class="ll-head-2">
        GRACE PERIOD
    </div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Grace Awal
        </label>
        <indate name="grace_start" bind-to="graceStart" v-bind:dateval="graceStart"></indate>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Grace Akhir
        </label>
        <indate name="grace_end" bind-to="graceEnd" v-bind:dateval="graceEnd"></indate>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup>
        <label slot="label">
            Grace Total
        </label>
        <label v-text="gracePeriod + ' Month'"></label>
    </frgroup>

</accordion>
