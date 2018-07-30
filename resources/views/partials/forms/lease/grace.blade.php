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

    <frgroup v-show="gracePeriod !== 0">
        <label slot="label">
            Grace Total
        </label>
        <label class="label-2" v-text="gracePeriod + ' Month'"></label>
    </frgroup>

</accordion>
