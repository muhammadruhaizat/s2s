	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
				  function initMap() {
					var map = new google.maps.Map(document.getElementById('map'), {
					  zoom: 8,
					  center: {lat: -34.397, lng: 150.644}
					});
					var geocoder = new google.maps.Geocoder();

					<?php $i = 0; foreach($senarai_sekolah as $each_senarai_sekolah): $i++;?>
						<?php if($i < 10):?>
							geocodeAddress(geocoder, "<?php echo $each_senarai_sekolah->NamaSekolah;?>", "<?php echo $each_senarai_sekolah->KodSekolah;?>", map);
						<?php else:?>
						//setTimeout(function(){
						//   window.location.reload(1);
						//}, 500);
						<?php endif;?>
					<?php endforeach;?>
				  }

				  function geocodeAddress(geocoder, address, KodSekolah, resultsMap) {
					//var address = document.getElementById('address').value;
					geocoder.geocode({'address': address}, function(results, status) {
					  if (status === 'OK') {
						//resultsMap.setCenter(results[0].geometry.location);
						var datastr = '{"mode":"InsertLatLong","KodSekolah":"'+KodSekolah+'","Lat":"'+results[0].geometry.location.lat()+'","Long":"'+results[0].geometry.location.lng()+'"}';
						//alert(datastr);
						//alert(datastr);
						$.ajax({
							url: "http://localhost/s2s/main/ajax",
							type: "POST",
							data: {"datastr":datastr},
							success: function(data){
								//alert(data);
							}
						});
						//var marker = new google.maps.Marker({
						//  map: resultsMap,
						//  position: results[0].geometry.location
						//});
					  } else {
						  if(status == "ZERO_RESULTS"){
							var datastr = '{"mode":"InsertLatLong","KodSekolah":"'+KodSekolah+'","Lat":"0","Long":"0"}';
							$.ajax({
								url: "http://localhost/s2s/main/ajax",
								type: "POST",
								data: {"datastr":datastr},
								success: function(data){
									//alert(data);
								}
							});							  
						  }
						  console.log('Geocode for ' + KodSekolah + ' was not successful for the following reason: ' + status);
					  }
					});
				  }
			</script>
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8iIX4QeCeUrCdq54V4P5IzjfLRD-3dPA&callback=initMap">
			</script>
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->
		<div id="map"></div>
						<!--<div id="mapDashboard" style="text-align:center; padding: 20px 10px 50px 10px;height:490px;">
<iframe src="https://www.google.com/maps/d/embed?mid=1X0LXhDCYVy58ZY9slzYiw8BDVTY" style="width:100%;height:490px;"></iframe>
						</div>-->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>