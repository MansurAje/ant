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
                    <a href="<?php echo base_url('admin/dashboard') ?>">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/vertifikasi/permohonan') ?>">Data Permohonan</a>
                </li>
                
                <li class="active">Detail Permohonan</li>
            </ul><!-- /.breadcrumb -->

            

            <!-- /section:basics/content.searchbox -->
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
                    Form Detail Permohonan
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" role="form" name="myform" action="<?php echo base_url('admin/vertifikasi/action/'.$id); ?>" enctype="multipart/form-data"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-3" style="border-bottom: 2px solid #6EBACC;">
                            Detil Data  :
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Pemilik</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="nmPemilik" value="<?php echo $detailData->nama_pemilik ?>" readonly placeholder="Isi Nama Pemilik" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Restoran</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="nmRestoran" value="<?php echo $detailData->nama_restoran ?>" readonly placeholder="Isi Nama Restoran" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat Restoran</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="alamat" value="<?php echo $detailData->alamat ?>" readonly placeholder="Isi Alamat Restoran" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Telp</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="noTelp" value="<?php echo $detailData->no_telp ?>" readonly placeholder="Isi No Telp" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">RT / RW</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="rtrw" value="<?php echo $detailData->rt_rw ?>" readonly placeholder="Isi Rt / RW" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kecamatan</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="kecamatan" value="<?php echo $detailData->kecamatan ?>" readonly placeholder="Isi Kecamatan" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kelurahan</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="kelurahan" value="<?php echo $detailData->kelurahan ?>" readonly placeholder="Isi Kelurahan" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Luas Tanah</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="luasTanah" value="<?php echo $detailData->luas_tanah ?>" readonly placeholder="Isi Luas Tanah" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Luas Bangunan</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="luasBangunan" value="<?php echo $detailData->luas_bangun ?>" readonly placeholder="Isi Luas Bangunan" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group control-label">
                            <label class="col-sm-3 control-label">Koordinat</label>
                            <div class="col-sm-6">
                               <input type="text" name="latlng" id="info2" readonly value="<?php //echo '0.021322979237416443, 109.34933387495118';?>" required class="form-control" placeholder="Masukan Koordinat Kosant"/>
								<div id="panel" style="visibility: hidden;">
									<input id="city_country" type="textbox" value="Tangerang">
									<!-- <input type="button" value="Geocode" onclick="codeAddress()"> -->
								</div>  
							
							   <div id="infoPanel" style="visibility:hidden; height:1px;">
									<b>Marker status:</b>
									<div id="markerStatus"><i>Click and drag the marker.</i></div>
									<b>Current position:</b>
									<div id="info"></div>
									<b>Cl</b>
								</div> 
							  <div id="mapCanvas"></div>
							</div>
						</div>
						
						<br/>
		                
						<table id="" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Jenis File Upload</th>
									<th>Uploaded File</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($listData AS $value){ ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td>
											<?php echo $value->nama_jenis; ?>
										</td>
										<td>
											<?php 
												$file = $this->M_permohonan->getDataFileById($id,$value->id_jenis);
												
												?>
												<a href="<?php echo base_url("assets/upload/permohonan/".$id."/".$file->nama_file); ?>" target="_blank">
													<?php echo $file->nama_file; ?>
												</a>
												<input type="hidden" name="idUpload[<?php echo $value->id_jenis; ?>]" value="<?php echo $file->id_file; ?>"/>
												<?php
											?>
										</td>
										
									</tr>
								<?php } ?>
							</tbody>
						</table>
						
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="vertifikasi" class="btn btn-info" value="vertifikasi">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Vertifikasi
                                </button>
								<button name="tolak"  class="btn btn-danger" value="tolak">
                                    <i class="ace-icon fa fa-times-circle bigger-110"></i>
                                    Tolak
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script>
    function test123(action){
		alert("clicked");
        document.getElementById('myform').action = action;
        document.getElementById('myform').submit();
    }
</script>

<?php
	$explode	= explode(",",$detailData->latlng);
	$lat 		= $explode[0];
	$lng 		= $explode[1];
?>

<script>
	var geocoder;
	var map;
	var marker;

	codeAddress = function () {
		geocoder = new google.maps.Geocoder();
		
		
		var latlng  = {lat: parseFloat(<?php echo $lat; ?>), lng: parseFloat(<?php echo $lng; ?>)};
		geocoder.geocode( { 'location': latlng}, function(results, status) {
		/* var address = document.getElementById('city_country').value;
		geocoder.geocode( { 'address': address}, function(results, status) { */
			if (status == google.maps.GeocoderStatus.OK) {
				map = new google.maps.Map(document.getElementById('mapCanvas'), {
					zoom: 17,
					streetViewControl: false,
					mapTypeControlOptions: {
						style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
						mapTypeIds:[google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.ROADMAP] 
					},
					center: results[0].geometry.location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				map.setCenter(results[0].geometry.location);
				marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					draggable: true,
					title: 'My Title'
				});
				updateMarkerPosition(results[0].geometry.location);
				geocodePosition(results[0].geometry.location);
			
				// Add dragging event listeners.
				google.maps.event.addListener(marker, 'dragstart', function() {
					updateMarkerAddress('Dragging...');
				});
		  
				google.maps.event.addListener(marker, 'drag', function() {
					updateMarkerStatus('Dragging...');
					updateMarkerPosition(marker.getPosition());
				});

				google.maps.event.addListener(marker, 'dragend', function() {
					updateMarkerStatus('Drag ended');
					geocodePosition(marker.getPosition());
					map.panTo(marker.getPosition()); 
				});

				google.maps.event.addListener(map, 'click', function(e) {
					updateMarkerPosition(e.latLng);
					geocodePosition(marker.getPosition());
					marker.setPosition(e.latLng);
					map.panTo(marker.getPosition()); 
				}); 
	  
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}

	function geocodePosition(pos) {
		geocoder.geocode({
			latLng: pos
		}, 
		function(responses) {
			if (responses && responses.length > 0) {
				updateMarkerAddress(responses[0].formatted_address);
			} else {
				updateMarkerAddress('Cannot determine address at this location.');
			}
		});
	}

	function updateMarkerStatus(str) {
		document.getElementById('markerStatus').innerHTML = str;
	}

	function updateMarkerPosition(latLng) {
		document.getElementById('info').text = [
			latLng.lat(),
			latLng.lng()
		].join(', ');
		
		$('#info2').val([
			latLng.lat(),
			latLng.lng()
		].join(', '));
	}

	function updateMarkerAddress(str) {
		document.getElementById('address').innerHTML = str;
	}

	window.onload = function() {
		codeAddress();
	};
</script>