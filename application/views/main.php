	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
				  function initMap() {
					var map = new google.maps.Map(document.getElementById('mapDashboard'), {
					  zoom: 6,
					  center: {lat: 3.949226, lng: 108.161876}
					});
					
					// Define the LatLng coordinates for the polygon's path.
					var triangleCoords = [
					  {lat: 7.480527, lng: 97.667789},
					  {lat: 7.765417, lng: 117.787919},
					  {lat: 2.745152, lng: 121.655164},
					  {lat: -1.852361, lng: 104.722899}
					];

					// Construct the polygon.
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
								title: "<?php echo $each_senarai_sekolah->NamaSekolah;?>"
							});
							
			
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
					
					$('#dialog button').click(function(){
						$('#dialog-overlay').fadeOut(300);
					})
				  }
					function showDialog(title, text){
						$('#dialog .title').html(title);
						$('#dialog .text').html(text);
						$('#dialog-overlay').fadeIn(300);
					}
			</script>
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8iIX4QeCeUrCdq54V4P5IzjfLRD-3dPA&libraries=geometry&&callback=initMap">
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
						<div id="mapDashboard" style="text-align:center; padding: 20px 10px 50px 10px;height:490px;">
						</div>
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