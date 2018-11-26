<accordion name="collapse-broker" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        BROKER
    </div>

    <frgroup>
        <label slot="label">
           Nama Broker
        </label>
        <div>{{ $lease->brok_name }}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
           Fee Per Tahun
        </label>
        <div>{{ $lease->brok_fee_yearly }}</div>
    </frgroup>

    

</accordion>
