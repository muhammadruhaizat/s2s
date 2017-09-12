	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				var map,infoWindow;
				try{ace.settings.loadState('main-container')}catch(e){}
				  function initMap() {
					infoWindow = new google.maps.InfoWindow;
					var map = new google.maps.Map(document.getElementById('mapDashboard'), {
					  zoom: 6,
					  center: {lat: 3.949226, lng: 108.161876}
					});
					
					var input = document.getElementById('pac-input');
					var searchBox = new google.maps.places.SearchBox(input);
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					map.addListener('bounds_changed', function() {
					  searchBox.setBounds(map.getBounds());
					});
					
					var markers = [];
					searchBox.addListener('places_changed', function() {
					  var places = searchBox.getPlaces();

					  if (places.length == 0) {
						return;
					  }
					  
					  // Clear out the old markers.
					  markers.forEach(function(marker) {
						marker.setMap(null);
					  });
					  markers = [];

					  var bounds = new google.maps.LatLngBounds();
					  places.forEach(function(place) {
						if (!place.geometry) {
						  console.log("Returned place contains no geometry");
						  return;
						}
						var icon = {
						  url: place.icon,
						  size: new google.maps.Size(71, 71),
						  origin: new google.maps.Point(0, 0),
						  anchor: new google.maps.Point(17, 34),
						  scaledSize: new google.maps.Size(25, 25)
						};
						
						// Create a marker for each place.
						markers.push(new google.maps.Marker({
						  map: map,
						  icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
						  title: place.name,
						  position: place.geometry.location
						}));

						if (place.geometry.viewport) {
						  bounds.union(place.geometry.viewport);
						} else {
						  bounds.extend(place.geometry.location);
						}
					  });
					  map.fitBounds(bounds);
					});
					
					var triangleCoords = [
					  {lat: 7.480527, lng: 97.667789},
					  {lat: 7.765417, lng: 117.787919},
					  {lat: 2.745152, lng: 121.655164},
					  {lat: -1.852361, lng: 104.722899}
					];

					var malaysiaTriangle = new google.maps.Polygon({
					  paths: triangleCoords,
					  strokeColor: '#FF0000',
					  strokeOpacity: 0.8,
					  strokeWeight: 2,
					  fillColor: '#FF0000',
					  fillOpacity: 0.35
					});
					//malaysiaTriangle.setMap(map);
					
					<?php foreach($senarai_sekolah as $each_senarai_sekolah):?>
							var schoolLatLng = {lat: <?php echo $each_senarai_sekolah->Latitude;?>, lng: <?php echo $each_senarai_sekolah->Longitude;?>};

						  if(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(<?php echo $each_senarai_sekolah->Latitude;?>, <?php echo $each_senarai_sekolah->Longitude;?>), malaysiaTriangle) == true){
							
							var marker = new google.maps.Marker({
								position: schoolLatLng,
								map: map,
							<?php if($each_senarai_sekolah->star_rate == 1):?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png',
							<?php elseif($each_senarai_sekolah->star_rate == 2):?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
							<?php elseif($each_senarai_sekolah->star_rate == 3):?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png',
							<?php elseif($each_senarai_sekolah->star_rate == 4):?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
							<?php elseif($each_senarai_sekolah->star_rate == 5):?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
							<?php else:?>
								icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
							<?php endif;?>
								draggable:true,
								title: "<?php echo $each_senarai_sekolah->NamaSekolah;?>"
							});
							//var marker = new google.maps.Marker({
							//	position: schoolLatLng,
							//	map: map,
							//	draggable:true,
							//	title: "<?php echo $each_senarai_sekolah->NamaSekolah;?>"
							//});
							
							google.maps.event.addListener(marker, 'click', function(marker){
								showDialog('Maklumat Sekolah','Tunggu sebentar...')
								var namaSekolah = this.title;
								$.ajax({
									url: 'main/POI_info/'+encodeURI(namaSekolah).replace(/\(/g, "%28").replace(/\)/g, "%29").replace(/'/g, "%27"),
									success: function (res){
										showDialog('Maklumat Sekolah', res);
									}
									
								})
							});
						  }
					<?php endforeach;?>
					
					if (navigator.geolocation) {
					  navigator.geolocation.getCurrentPosition(function(position) {
						var pos = {
						  lat: position.coords.latitude,
						  lng: position.coords.longitude
						};

						infoWindow.setPosition(pos);
						infoWindow.setContent('Anda berada di sini.');
						infoWindow.open(map);
						map.setCenter(pos);
						map.setZoom(14);
					  }, function() {
						handleLocationError(true, infoWindow, map.getCenter());
					  });
					} else {
					  // Browser doesn't support Geolocation
					  handleLocationError(false, infoWindow, map.getCenter());
					}
					
					
					var iconBase = '<?php echo base_url();?>assets/images/';
					var icons = {
					  tiada: {
						name: 'Tiada',
						icon: iconBase + 'red-dot.png'
					  },
					  satubintang: {
						name: '1 Bintang',
						icon: iconBase + 'orange-dot.png'
					  },
					  duabintang: {
						name: '2 Bintang',
						icon: iconBase + 'yellow-dot.png'
					  },
					  tigabintang: {
						name: '3 Bintang',
						icon: iconBase + 'purple-dot.png'
					  },
					  empatbintang: {
						name: '4 Bintang',
						icon: iconBase + 'blue-dot.png'
					  },
					  limabintang: {
						name: '5 Bintang',
						icon: iconBase + 'green-dot.png'
					  }
					};

					var legend = document.getElementById('legend');
					for (var key in icons) {
					  var type = icons[key];
					  var name = type.name;
					  var icon = type.icon;
					  var div = document.createElement('div');
					  div.innerHTML = '<img src="' + icon + '"> ' + name;
					  legend.appendChild(div);
					}

					map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
					$("#legend").show();
					
					$('#dialog button').click(function(){
						$('#dialog-overlay').fadeOut(300);
					})
				  }
					function showDialog(title, text){
						$('#dialog .title').html(title);
						$('#dialog .text').html(text);
						$('#dialog-overlay').fadeIn(300);
					}

				  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
					infoWindow.setPosition(pos);
					infoWindow.setContent(browserHasGeolocation ?
										  'Error: The Geolocation service failed.' :
										  'Error: Your browser doesn\'t support geolocation.');
					infoWindow.open(map);
				  }
			</script>
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPgtXg73DLrpz9iYXQiOGd9ZfHHxmfdTM&libraries=geometry,places&callback=initMap">
			</script>
			<style>
			

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
		top: 13px !important;
      }
      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
		text-align: left;
		display: none;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }
			</style>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Utama</a>
							</li>
							<li class="active">Peta</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Peta
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									peta penarafan sekolah
								</small>
							</h1>
						</div><!-- /.page-header -->
						<input id="pac-input" class="controls" type="text" placeholder="Carian">
						<div id="mapDashboard" style="text-align:center; padding: 20px 10px 50px 10px;height:490px;"></div>
						<div id="legend"><h3>Petunjuk</h3></div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>
	<div id="dialog-overlay" style="position: fixed; left: 0; right: 0; bottom: 0; top: 0; background: rgba(0,0,0,0.5); z-index: 3000; text-align: center; display: none">
		<div id="dialog" style="width: 500px; background: #eee; padding: 10px; border-radius: 5px; box-shadow: 0 0 30px rgba(0,0,0,1); margin: 0 auto; margin-top: 200px; text-align: left;">
			<h3 class="title" style="margin: 5px 0; padding: 0"></h3>
			<br/>
			<p class="text" style="color: #555"></p>
			<hr style="border-bottom: 1px solid #fff; border-top: 1px solid #aaa;" />
			<div style="text-align: right">
			<button>OK</button>
			</div>
		</div>
	</div>