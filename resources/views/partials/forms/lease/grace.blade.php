<accordion name="collapse-grace">

    <div slot="title" class="ll-head">
        GRACE
    </div>

    <frgroup wi="4">
        <label slot="label">
            Grace Awal
        </label>
        <indate name="grace_start" v-bind:value="graceStart"></indate>
    </frgroup>

    <frgroup wi="4">
        <label slot="label">
            Grace Akhir
        </label>
        <indate name="grace_end" v-bind:value="graceEnd"></indate>
    </frgroup>

    <frgroup>
        <label slot="label">
            Grace Total
        </label>
        <label v-text="gracePeriod + ' Month'"></label>
    </frgroup>

</accordion>
