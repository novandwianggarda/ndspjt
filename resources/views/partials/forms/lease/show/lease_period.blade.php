<accordion name="collapse-lease-period" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        LEASE PERIOD
    </div>


     <frgroup  wl="2" wi="4">
        <label slot="label">
            Awal Sewa
        </label>
        <div>{{ $lease->start }}
        </div>
    </frgroup>
    <frgroup  wl="2" wi="4">
        <label slot="label">
            Akhir Sewa
        </label>
        <div>{{ $lease->end }}
        </div>
    </frgroup>

    <div class="clearfix"></div>

</accordion>
