<accordion name="collapse-grace" v-bind:sub="true" style="margin-bottom:10px;">

    <div slot="title" class="ll-head-2">
        GRACE PERIOD
    </div>
    <frgroup>
        <label slot="label">
            Grace Awal
        </label>
        <div>{{ $lease->grace_start }}
        </div>
    </frgroup>
    <frgroup>
        <label slot="label">
            Grace Akhir
        </label>
        <div>{{ $lease->grace_end }}
        </div>
    </frgroup>

    <div class="clearfix"></div>

</accordion>
