<accordion name="collapse-outstanding" v-bind:sub="true" collapse="in">

    <div slot="title" class="ll-head-2">
        OTHER INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Status
        </label>

        @if($lease->status =='')

        <div class="input-group">
            
            @can('userman', $lease)
                <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#editModal-{{ $lease->id }}">Belum</button>
                                                <div class="modal fade" id="editModal-{{ $lease->id }}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog">
                                                          <!-- Modal content-->
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
                                                          <!-- Modal content-->
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


    </frgroup>

    <frgroup>
        <label slot="label">
            Jaminan
        </label>
        <div>Rp.
        	<?php 

        		$jaminan = $lease->rent_assurance;
        		echo number_format((float)$jaminan, 0, ".", ".")."<br />";
        	?>
        </div>    
    </frgroup>	
    <frgroup>
        <label slot="label">
           Notes
        </label>
        <div>{!! $lease->note !!}</div>
    </frgroup>




</accordion>

    

