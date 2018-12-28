<accordion name="collapse-property-price" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        OFFER PRICE
    </div>

    <div class="col-md-12">
      <table style="width:100%">
      <tr>
        <th>Penawaran per Bulan</th>
        <th>Penawaran per Tahun</th>
      </tr>
      <tr>
        <td>{{ $lease->sell_monthly }}</td>
        <td>{{ $lease->sell_yearly }}</td>
      </tr>
    </table>  
    </div>


        <!-- <frgroup>
            <label slot="label">
               Penawaran per Bulan
            </label>
            <div>: &nbsp;{{ $lease->sell_monthly }}</div>
        </frgroup>

        <frgroup>
            <label slot="label">
               Penawaran per Tahun
            </label>
            <div>: &nbsp;{{ $lease->sell_yearly }}</div>
        </frgroup> -->

</accordion>
