<accordion name="collapse-outstanding" v-bind:sub="true">

    <div slot="title" class="ll-head-2">
        OTHER INFORMATION
    </div>

    <frgroup>
        <label slot="label">
           Keterangan
        </label>
        <div>{{ $lease->note }}</div>
    </frgroup>

</accordion>
