<!-- <accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <div class="col-md-12">
        <table style="width:100%">
          <tr>
            <th>Yang Menyewakan</th>
            <th>Nama Penyewa</th>
            <th>PKP Yang Menyewakan</th>
            <th>Keperluan Sewa</th>
            <th>PIC</th>
          </tr>
          <tr>
            <td width="25%">{{ $lease->lessor }}</td>
            <td width="20%">{{ $lease->tenant }}</td>
            <td width="20%">{{ $lease->lessor_pkp }}</td>
            <td width="20%">{{ $lease->purpose }}</td>
            <td width="15%">{{ $lease->pic }}</td>
          </tr>
        </table>
    </div>

    <div class="col-md-12">
        <table style="width:100%">
          <tr>
            <th>Awal Sewa</th>
            <th>Akhir Sewa</th>
            <th>Sewa Per Tahun (DPP)</th>
            <th>Nama Broker</th>
            <th>Fee Per Tahun</th>
          </tr>
          <tr>
            <td width="25%">
                <?php 
                if($lease->start==null){
                    $staar='';
                }else{ 
                $tgl=strtotime($lease->start);
                $staar=date("d F Y", $tgl);
                }
                ?>
                {{@$staar}}
            </td>
            <td width="20%">
                <?php 
                if($lease->end==null){
                    $ends='';
                }else{ 
                $tgl=strtotime($lease->end);
                $ends=date("d F Y", $tgl);
                }
                ?>
                {{@$ends}}
            </td>
            <td width="20%">
                Rp.
                <?php 

                    $jaminan = $lease->rent_price;
                    echo number_format($jaminan, 0, ".", ".")."<br />";
                ?>
            </td>
           <td width="20%">{{ $lease->brok_name }}</td>
            <td width="15%">Rp.
            <?php 

                $fee = $lease->brok_fee_yearly;
                echo number_format((float)$fee, 0, ".", ".")."<br />";
            ?></td>

          </tr>
        </table>
    </div>
    <div class="col-md-12">
        <table style="width:100%">
          <tr>
            <th>Penawaran Per Bulan</th>
            <th>Penawaran Per Tahun</th>
            <th>Status</th>
            <th>Jaminan</th>
            <th>Note</th>
          </tr>
          <tr>
            <td width="25%">{{ $lease->lessor }}</td>
            <td width="20%">{{ $lease->tenant }}</td>
            <td width="20%">

                @if($lease->status =='')

                <div class="input-group">
                    
                    @can('userman', $lease)
                        <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#editModal-{{ $lease->id }}">Belum</button>
                                                        <div class="modal fade" id="editModal-{{ $lease->id }}" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Update Status Lease</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('updatemodal')}}" id="editModal">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{ $lease->id}}">
                                                                            <input type="radio" name="status" value="Acc">&nbsp;Acc
                                                                            <br>

                                                                            <div align="right">
                                                                            <button type="submit" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                                                                                <i class="fa fa-plus"></i>
                                                                                Update
                                                                            </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                        </div>
                    @endcan
                </div>

                @else($lease->status =='Acc')

                    <div class="input-group">
                    @can('userman', $lease)
                       <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#editModal-{{ $lease->id }}">{{ $lease->status }}</button>
                                                        <div class="modal fade" id="editModal-{{ $lease->id }}" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Update Status Lease</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('updatemodal')}}" id="editModal">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{ $lease->id}}">
                                                                            <input type="radio" name="status" value="Acc">&nbsp;Acc
                                                                            <br>

                                                                            <div align="right">
                                                                            <button type="submit" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                                                                                <i class="fa fa-plus"></i>
                                                                                Update
                                                                            </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                        </div>
                    @endcan
                    </div>
                @endif        
            </td>
            <td width="20%">Rp.
            <?php 

                $jaminan = $lease->rent_assurance;
                echo number_format((float)$jaminan, 0, ".", ".")."<br />";
            ?></td>
            <td width="15%">{!! $lease->note !!}</td>
          </tr>
        </table>
    </div>

    


    <div class="clearfix"></div>

    @include('partials.forms.lease.show.agreement')


    <div class="col-md-12">
        <table style="width:100%">
            <thead>
                <tr>
                    <th><center>Balance &amp; Payment Term</center></th>
                    <th><center>Balance &amp; Payment History</center></th>
                    <th><center>Tagihan Lainya</center></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="33%">
                        @foreach($payment_teerm as $mydata)
                            <div class="col-md-12">Pembayaran  &nbsp; :&nbsp;Rp.
                                <?php 

                                    $tagihan = $mydata->total;
                                    echo number_format($tagihan, 0, ".", ".")."<br />";
                                ?>
                            </div>
                            <div class="col-md-12">Due Date  &nbsp; : 
                                <?php 
                                    if($mydata->due_date==null){
                                        $tang='';
                                    }else{ 
                                        $tgl=strtotime($mydata->due_date);
                                        $tang=date("d F Y", $tgl);
                                    }
                                ?>
                            {{@$tang}}
                            </div>
                            <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>
                        @endforeach
                    </td>

                    <td width="33%">
                       @foreach($payment_hist as $mydata)
                            <div class="col-md-12">Pembayaran  &nbsp; :&nbsp;Rp.
                                <?php 

                                    $tagihan = $mydata->total;
                                    echo number_format($tagihan, 0, ".", ".")."<br />";
                                ?>
                            </div>
                            <div class="col-md-12">Paid Date  &nbsp; : 
                                <?php 
                                    if($mydata->paid_date==null){
                                        $tang='';
                                    }else{ 
                                        $tgl=strtotime($mydata->paid_date);
                                        $tang=date("d F Y", $tgl);
                                    }
                                ?>
                                {{@$tang}}
                            </div>
                            <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>
                        @endforeach
                    </td>

                    <td width="33%">
                        @foreach($payment_invoice as $mydata)
                        <div class="col-md-12">Pembayaran  &nbsp; :&nbsp;Rp.
                            <?php 

                                $tagihan = $mydata->total;
                                echo number_format((float)$tagihan, 0, ".", ".")."<br />";
                            ?>
                        </div>

                        <div class="col-md-12">Paid Date  &nbsp; :

                            <?php 
                                if($mydata->paid_date==null){
                                    $tang='';
                                }else{ 
                                    $tgl=strtotime($mydata->paid_date);
                                    $tang=date("d F Y", $tgl);
                                }
                            ?>
                            {{@$tang}}
                        </div>
                        <br>
                        <div class="col-md-12">Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$mydata->note}}</div>

                    @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</accordion> -->


<accordion name="collapse-lease" collapse="in">

    <div slot="title" class="ll-head">
        LEASE
    </div>

    <frgroup>
        <label slot="label">
            Yang Menyewakan
        </label>
        <div>: &nbsp;{{ $lease->lessor }}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
            PKP Yang Menyewakan
        </label>
        <div class="input-group">
            <label class="radio-inline"><input type="radio" name="lessor_pkp" v-model="lessorPKP" :value="true">Ya</label>
            <label class="radio-inline"><input type="radio" name="lessor_pkp" v-model="lessorPKP" :value="false">Tidak</label>
            <label class="radio-inline text-muted">
                <i class="fa fa-info-circle"></i>
                <span v-if="lessorPKP">Termasuk PPN</span>
                <span v-else>Tanpa PPN</span>
            </label>
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nama Penyewa
        </label>
        <div>: &nbsp;{{ $lease->tenant }}</div>

    </frgroup>

    

    <frgroup>
        <label slot="label">
            Tipe Penyewa
        </label>
        <div>: &nbsp;{{ $lease->tenant_type }}</div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Keperluan Sewa
        </label>
        <div>: &nbsp;{{ $lease->purpose }}</div>

    </frgroup>

    <frgroup>
        <label slot="label">
            PIC
        </label>
        <div>: &nbsp;{{ $lease->pic }}</div>
        

    </frgroup>

    <!-- AGREEMENT -->
    @include('partials.forms.lease.show.agreement')

    <!-- GRACE PERIOD -->
    @include('partials.forms.lease.show.grace')

    <!-- LEASE PERIOD -->
    @include('partials.forms.lease.show.lease_period')

    <!-- LEASE PRICE -->
    @include('partials.forms.lease.show.lease_price')

    <!-- PAYMENT TERMS-->
    @include('partials.forms.lease.show.payment_term')

    <!-- PAYMENT balance HISTORY -->
    @include('partials.forms.lease.show.payment_history')

    <!-- INVOICE Tagihan Lainya-->
    @include('partials.forms.lease.show.payment_invoice')


    <!-- BROKER -->
    @include('partials.forms.lease.show.broker')

    <!-- OTHER -->
    @include('partials.forms.lease.show.other')

</div>

</accordion>
