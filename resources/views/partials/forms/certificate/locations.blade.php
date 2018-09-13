<accordion name="collapse-map">
	<div slot="title" class="ll-head">
		LOCATIONS
	</div>

	<!-- <div class="mapouter">
		<div class="gmap_canvas">
			<iframe width="1000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=semarang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
			</iframe>
			<a href="https://www.pureblack.de"></a>
		</div>
		<style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}
		</style>
	</div> -->
    <div>
        <div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="map" style="width:100%;height:400px"></div>
                    </div>
                    <div class="col-md-12 item boundary_coordinates">
                        <br>
                        <div style="float:left;">
                                                    <button class="btn btn-sm btn-warning" type="button" onclick="clearMap(); return false;"><i class="fa fa-trash"></i> Clear Map</button>
                                                    <button class="btn btn-sm btn-info" type="button" onclick="makeBoundary(); return false;"><i class="fa fa-map"></i> Make Boundary</button>
                                                    <span>&nbsp;&nbsp;<b>Area</b>: <span id="polygonArea">0</span> m<sup>2</sup></span>
                                                </div>
                        <div class="alert boundary_coordinates" style="">Edited by Admin</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <input type="hidden" name="boundary_coordinates" id="boundary_coordinates">
            </div>
        </div>
    </div>
                            

</accordion>