<accordion name="collapse-map">
	<div slot="title" class="ll-head">
		LOCATIONS
	</div>

  <div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <div id="map" style="width:100%;height:500px"></div>
        </div>

        <div class="col-md-12 item boundary_coordinates">
            <br>
            <div style="float:left;">
                <button class="btn btn-sm btn-warning" type="button" onclick="clearMap(); return false;"><i class="fa fa-trash"></i> Clear Map</button>
                <button class="btn btn-sm btn-info" type="button" onclick="makeBoundary(); return false;"><i class="fa fa-map"></i> Make Boundary</button>
                <span>&nbsp;&nbsp;<b>Area</b>: <span id="polygonArea">0</span> m<sup>2</sup></span>
            </div>
            <div class="alert boundary_coordinates" style="">DS-LandLord</div>
            <div class="clearfix"></div>
        </div>
    </div>
    <input type="hidden" name="boundary_coordinates" id="boundary_coordinates">
  </div>


</accordion>