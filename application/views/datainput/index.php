	<?php echo validation_errors(); ?>
	<?php //echo form_open('form'); ?>


	<script type="text/javascript">
		jQuery(function($) {
			$('.date-picker').datepicker({
				autoclose: true,
				todayHighlight: true
			})
			//show datepicker when clicking on the icon
			.next().on(ace.click_event, function(){
				$(this).prev().focus();
			});
		});
	</script>

				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>">Home</a>
							</li>
							<li class="active">Process Data</li>
						</ul><!-- /.breadcrumb -->
					</div>
					
					

					<div class="page-content">
						<div class="page-header">
							<h1>
								Data Input
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									upload &amp; process
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">Assessment</h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<form class="form-horizontal" role="form" method="post" action="process/processdata" enctype="multipart/form-data">
											<br/>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Number of lanes </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="NOL" class="form-control" value="<?php echo set_value('NOL'); ?>">
																<option value=""> --Please Select-- </option>
																<option value="1"> One </option>
																<option value="2.8"> Two </option>
																<option value="5.2"> Three </option>
																<option value="8"> Four or more </option>
																<option value="1.8"> Two and one </option>
																<option value="4"> Three and two </option>
															</select>
											          <img src="<?php echo base_url();?>assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Median Type </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="MT" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Safety barrier - metal </option>
																<option value="1"> Safety barrier - concrete </option>
																<option value="1"> Physical median width >=20m </option>
																<option value="1"> Physical median width 10 to <20m </option>
																<option value="1"> Physical median width 5 to <10m </option>
																<option value="1"> Physical median width 1 to <5m </option>
																<option value="1.6"> Physical median width 0 to <1m </option>
																<option value="3"> Continuous central turning lane </option>
																<option value="2.7"> Flexible posts </option>
																<option value="2.4"> Central hatching (>1m) </option>
																<option value="3"> Centre line </option>
																<option value="1"> Safety barrier - motorcycle friendly </option>
																<option value="1"> One way </option>
																<option value="2.7"> Wide centre line (0.3m to 1m) </option>
																<option value="1"> Safety barrier - wire rope </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sidewalk - Driver Side </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SWDS" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="0"> Physical Barrier </option>
																<option value="0.075"> Non-physical separation ≥ 3.0m </option>
																<option value="0.09"> Non-physical separation 1.0m to <3.0m </option>
																<option value="0.1"> Non-physical separation 0m to <1.0m </option>
																<option value="20"> None </option>
																<option value="5"> Informal path ≥ 1.0m </option>
																<option value="6"> Informal path 0m to <1.0m </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sidewalk - Passenger Side </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SWPS" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="0"> Physical Barrier </option>
																<option value="0.075"> Non-physical separation ≥ 3.0m </option>
																<option value="0.09"> Non-physical separation 1.0m to <3.0m </option>
																<option value="0.1"> Non-physical separation 0m to <1.0m </option>
																<option value="20"> None </option>
																<option value="5"> Informal path ≥ 1.0m </option>
																<option value="6"> Informal path 0m to <1.0m </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Curvature </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="Curvature" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Straight or gently curving </option>
																<option value="1.8"> Moderate </option>
																<option value="3.5"> Sharp </option>
																<option value="6"> Very Sharp </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Quality of Curve </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="QOC" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Adequate </option>
																<option value="1.25"> Poor </option>
																<option value="1"> Not Applicable </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sight Distance </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SD" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Adequate </option>
																<option value="1.42"> Poor </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Lane Width </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="LW" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Wide (≥ 3.25m) </option>
																<option value="1.2"> Medium (≥ 2.75m to < 3.25m) </option>
																<option value="1.5"> Narrow (≥ 0m to < 2.75m) </option>
															</select> 
													<img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" />													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Delineation </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="Delineation" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Adequate </option>
																<option value="1.2"> Poor </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Grade </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="Grade" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> ≥ 0% to <7.5% </option>
																<option value="1.2"> ≥ 7.5% to <10% </option>
																<option value="1.7"> ≥ 10% </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Road condition </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="RC" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Good </option>
																<option value="1.2"> Medium </option>
																<option value="1.4"> Poor </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Skid Resistance / Grip </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SRG" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Sealed - adequate </option>
																<option value="1.4"> Sealed - medium </option>
																<option value="2"> Sealed - poor </option>
																<option value="3"> Unsealed - adequate </option>
																<option value="5.5"> Unsealed - poor </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Speed management / traffic calming </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SMTC" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.25"> Not present </option>
																<option value="1"> Present </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Vehicle parking </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="VP" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.33"> Two sides </option>
																<option value="1.2"> One side </option>
																<option value="1"> None </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Shoulder rumble strips </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SRS" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.25"> Not present </option>
																<option value="1"> Present </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> School zone warning </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SZW" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="0.9"> School zone flashing beacons </option>
																<option value="0.95"> School zone static signs or road markings </option>
																<option value="1"> No school zone warning </option>
																<option value="1"> Not applicable (no school at the location) </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Street lighting </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="SL" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.25"> Not present </option>
																<option value="1"> Present </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Crossing Facilities </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="PCF" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="0.4"> Grade separated facility </option>
																<option value="1"> Signalised with refuge </option>
																<option value="1.25"> Signalised without refuge </option>
																<option value="3.8"> Unsignalised marked crossing with refuge </option>
																<option value="4.8"> Unsignalised marked crossing without a refuge </option>
																<option value="5.1"> Refuge only </option>
																<option value="6.7"> No facility </option>
																<option value="2.5"> Unsignalised raised marked crossing with refuge </option>
																<option value="3.2"> Unsignalised raised marked crossing without refuge </option>
																<option value="3.4"> Raised unmarked crossing with refuge </option>
																<option value="4.5"> Raised unmarked crossing without refuge </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Crossing Quality </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="PCQ" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Adequate </option>
																<option value="1.5"> Poor </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Intersection Type </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="IT" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.05"> Merge lane </option>
																<option value="1.5"> Roundabout </option>
																<option value="1.1"> 3-leg unsignalised with protected turn lane </option>
																<option value="1.1"> 3-leg unsignalised with no protected turn lane </option>
																<option value="1.1"> 3-leg signalised with protected turn lane </option>
																<option value="1.1"> 3-leg signalised with no protected turn lane </option>
																<option value="1.2"> 4-leg unsignalised with protected turn lane </option>
																<option value="1.2"> 4-leg unsignalised with no protected turn lane </option>
																<option value="1.2"> 4-leg signalised with protected turn lane </option>
																<option value="1.2"> 4-leg signalised with no protected turn lane </option>
																<option value="1"> None </option>
																<option value="1"> Railway Crossing - passive (signs only) </option>
																<option value="1"> Railway Crossing - active (flashing lights / boom gates) </option>
																<option value="1.1"> Median crossing point - informal </option>
																<option value="1.1"> Median crossing point - formal </option>
																<option value="1.3"> Mini roundabout </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Intersection Quality </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="IQ" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1"> Adequate </option>
																<option value="1.2"> Poor </option>
																<option value="1"> Not Applicable </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Fencing </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="PF" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="1.25"> Not present </option>
																<option value="1"> Present</option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> External Flow Influence </label>
												<div class="col-sm-5">
													<input name="EFI" type="text" id="form-field-1" class="col-sm-12" placeholder="Number of lanes and AADT" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Operating Speed (85th percentile) </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="OS85P" class="form-control">
																<option value=""> --Please Select-- </option>
																<option value="0"> <30km/h </option>
																<option value="0.04"> 35km/h </option>
																<option value="0.05"> 40km/h </option>
																<option value="0.08"> 45km/h </option>
																<option value="0.12"> 50km/h </option>
																<option value="0.18"> 55km/h </option>
																<option value="0.25"> 60km/h </option>
																<option value="0.3"> 65km/h </option>
																<option value="0.4"> 70km/h </option>
																<option value="0.49"> 75km/h </option>
																<option value="0.55"> 80km/h </option>
																<option value="0.56"> 85km/h </option>
																<option value="0.6"> 90km/h </option>
																<option value="0.63"> 95km/h </option>
																<option value="0.66"> 100km/h </option>
																<option value="0.7"> 105km/h </option>
																<option value="0.74"> 110km/h </option>
																<option value="0.76"> 115km/h </option>
																<option value="0.8"> 120km/h </option>
																<option value="0.84"> 125km/h </option>
																<option value="0.86"> 130km/h </option>
																<option value="0.9"> 135km/h </option>
																<option value="0.94"> 140km/h </option>
																<option value="0.96"> 145km/h </option>
																<option value="1"> >=150km/h </option>
															</select>
											          <img src="file:///C|/xampp/htdocs/safer2school/s2s/assets/images/tooltip.ico" alt="" /></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Date </label>
												<div class="col-sm-5">
													<div class="input-group">
														<input name="TS" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" />
													
														<span class="input-group-addon">
															<i class="fa fa-calendar bigger-110"></i>
														</span>
													</div>
												</div>
											</div>
											</div>
											<div class="form-actions center">
												<button type="submit" class="btn btn-sm btn-success">
													Submit
													<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
												</button>
											</div>
											</form>
										</div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>