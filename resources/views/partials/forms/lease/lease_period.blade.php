<accordion name="collapse-lease-period" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        LEASE PERIOD
    </div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Awal Sewa
        </label>
        <indate name="start" bind-to="start" v-bind:dateval="start"></indate>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Akhir Sewa
        </label>
        <indate name="end" bind-to="end" v-bind:dateval="end"></indate>
    </frgroup>

    <div class="clearfix"></div>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Periode Sewa
        </label>
        <div class="input-group">
            <select name="period_type" class="form-control" v-model="periodType">
                <option value="yearly" selected>Yearly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
    </frgroup>

    <frgroup wl="2" wi="4">
        <label slot="label">
            Masa Sewa
        </label>
        <label v-text="duration + ' ' + periodTypeStr"></label>
    </frgroup>

    <div class="clearfix"></div>

</accordion>
