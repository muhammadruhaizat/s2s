	<?php header('Access-Control-Allow-Origin: *'); ?>
	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
			function CariBas(){
				//$.get("http://www.data.gov.my/data/api/action/datastore_search?resource_id=e3ef42d7-8e97-4718-a386-bb6199a4e033", function(data, status){
				//	alert("Data: " + data + "\nStatus: " + status);
				//});
				//var data = {
				//	resource_id: 'e3ef42d7-8e97-4718-a386-bb6199a4e033',
				//	limit: 5
				//};
				//$.ajax({
				//	//url: 'http://www.data.gov.my/data/api/action/datastore_search',
				//	url: 'https://mhroads.llm.gov.my/api/get_users',
				//	type: 'POST',
				//	//data: data,
				//	crossDomain: true,
				//	dataType: 'jsonp',
				//	async:true,
				//	complete: function(data) {
				//		alert('Total results found: ' + data.data);
				//	}
				//});
				
				var xhr = createCORSRequest('GET', 'https://mhroads.llm.gov.my/api/get_users');
				if (!xhr) {
				  throw new Error('CORS not supported');
				}
				
				  xhr.onload = function() {
					var text = xhr.responseText;
					var title = getTitle(text);
					alert('Response from CORS request to ' + url + ': ' + title);
				  };

				  xhr.onerror = function(error) {
					alert('Woops, there was an error making the request.'+error);
				  };

				  xhr.send();
				
				function createCORSRequest(method, url) {
				  var xhr = new XMLHttpRequest();
				  if ("withCredentials" in xhr) {

					// Check if the XMLHttpRequest object has a "withCredentials" property.
					// "withCredentials" only exists on XMLHTTPRequest2 objects.
					xhr.open(method, url, true);

				  } else if (typeof XDomainRequest != "undefined") {

					// Otherwise, check if XDomainRequest.
					// XDomainRequest only exists in IE, and is IE's way of making CORS requests.
					xhr = new XDomainRequest();
					xhr.open(method, url);

				  } else {

					// Otherwise, CORS is not supported by the browser.
					xhr = null;

				  }
				  return xhr;
				}
				
				//$.ajax({
				//	url: 'http://www.data.gov.my/data/api/action/datastore_search?resource_id=e3ef42d7-8e97-4718-a386-bb6199a4e033',
				//	type: 'post',
				//	//data: data,
				//	dataType: 'json',
				//	timeout: 5000,
				//	success: function (res){
				//		if (!res){
				//			try {
				//				timeout();
				//			} catch (e){
				//				// do nothing
				//			}						
				//		} else {
				//			alert(res);
				//			//success(res);
				//		}
				//	},
				//	error: function (res){
				//		try {
				//			timeout();
				//		} catch (e){
				//			// do nothing
				//		}
				//	}
				//});
			}
			</script>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Utama</a>
							</li>
							<li class="active">Carian Pengendali Bas Sekolah</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Carian Pengendali Bas Sekolah
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									cari
								</small>
							</h1>
						</div><!-- /.page-header -->
						<select>
							<option>--Sila pilih daerah--</option>
							<?php foreach($senarai_daerah as $eachDaerah):?>
							<option><?php echo $eachDaerah->BandarSurat;?></option>
							<?php endforeach;?>
						</select>
						<input type="button" value="Cari" id="iCari" onclick="CariBas();"/>
						<br/>
						<br/>
						<br/>
						
										<div class="table-header">
											Senarai Pengendali Bas Sekolah
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Domain</th>
														<th>Price</th>
														<th class="hidden-480">Clicks</th>

														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Update
														</th>
														<th class="hidden-480">Status</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#">app.com</a>
														</td>
														<td>$45</td>
														<td class="hidden-480">3,330</td>
														<td>Feb 12</td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">Expiring</span>
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>