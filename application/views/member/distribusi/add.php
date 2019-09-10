
<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>
                <li class="active">Distribution</li>
            </ul><!-- /.breadcrumb -->

          
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Distribution
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-6">
					<div id="map" 
						 style="height: 600px;
								float: left;
								width: 650px;">
					</div>
				</div><!-- /.col -->
				<div class="col-xs-5">
					<div id="directions-panel" style="margin-left: 100px;
						background-color: #FFEE77;
						padding: 10px;"></div>
				</div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">Petunjuk Arah Lokasi</h2>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-4">
						<b>&nbsp;Lokasi Asal :</b>
						<select id="start"  class="form-control">
							<?php foreach($depot AS $valdepot){ ?>
								<option value="<?php echo $valdepot->depot_latlng ?>"><?php echo $valdepot->depot_nama ?></option>
							<?php } ?>
						</select>
						<br>
						<b>Node</b>
						<select multiple class="form-control" id="waypoints">
							<?php foreach($node AS $mnode){ ?>
								<option value="<?php echo $mnode->node_latlng; ?>"><?php echo $mnode->node_name; ?></option>
							<?php } ?>
						</select>
						<br>
						<b>Tujuan  :</b>
						<br>
						<select id="end"  class="form-control">
							<?php foreach($depot AS $valdepot){ ?>
								<option value="<?php echo $valdepot->depot_latlng ?>"><?php echo $valdepot->depot_nama ?></option>
							<?php } ?>
						</select>
						
						<br>
						<input class="form-control btn btn-primary btn-sm" type="submit" value="Lihat" id="submit">
					</div>
					<div class="col-lg-5">
						<div id="directions-panel"></div>
					</div>						
				</div>
			</div>
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<script>
	function initMap() {
		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 8,
		  center: {lat: -6.2297264, lng: 106.6894312}
		});
		directionsDisplay.setMap(map);

		document.getElementById('submit').addEventListener('click', function() {

		  calculateAndDisplayRoute(directionsService, directionsDisplay);
		});
		var input = /** @type {!HTMLInputElement} */(
		  document.getElementById('start'));
		
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);
	}

	function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		var waypts = [];
		var checkboxArray = document.getElementById('waypoints');
		for (var i = 0; i < checkboxArray.length; i++) {
		  if (checkboxArray.options[i].selected) {
			waypts.push({
				location: checkboxArray[i].value,
				stopover: true
			});
		  }
		}

 		directionsService.route({
		   origin: document.getElementById('start').value,
			destination: document.getElementById('end').value,
		  waypoints: waypts,
		  optimizeWaypoints: true,
		  travelMode: 'DRIVING'
		}, function(response, status) {
		  if (status === 'OK') {
			directionsDisplay.setDirections(response);
			var route = response.routes[0];
			var summaryPanel = document.getElementById('directions-panel');
			summaryPanel.innerHTML = '';
			// For each route, display summary information.
			for (var i = 0; i < route.legs.length; i++) {
			  var routeSegment = i + 1;
			  summaryPanel.innerHTML += '<b>Petunjuk Arah :<br>'
				  '</b><br>';
			  summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
			  summaryPanel.innerHTML += route.legs[i].end_address + '<br><b>Jarak : <br>';
			  summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
			}
		  } else {
			window.alert('Directions request failed due to ' + status);
		  }
		});
	}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAimmxpez6ejTwZ0EZYNEgQmfHco7NJ0RQ&callback=&libraries=places&callback=initMap">
</script>
