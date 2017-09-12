	<?php echo validation_errors(); ?>
	<?php //echo form_open('form'); ?>


	<script type="text/javascript">
		jQuery(function($) {
			
				$( "#show-option" ).tooltip({
					show: {
						effect: "slideDown",
						delay: 250
					}
				});

			$('.date-picker').datepicker({
				autoclose: true,
				todayHighlight: true
			})
			//show datepicker when clicking on the icon
			.next().on(ace.click_event, function(){
				$(this).prev().focus();
			});
			
			
			var senaraiSekolah = [];
			
			<?php foreach($senarai_sekolah as $eachSekolah):?>
				senaraiSekolah.push({
					id: "<?php echo $eachSekolah->KodSekolah;?>",
					label: "<?php echo $eachSekolah->NamaSekolah.", ".$eachSekolah->PoskodSurat." ".$eachSekolah->BandarSurat.", ".$eachSekolah->Negeri." [ Kod Sekolah : ".$eachSekolah->KodSekolah." ]";?>"						
				});
			<?php endforeach;?>
			
			$('input[name=schoolName]').autocomplete({
				source: senaraiSekolah,
				select: function (event, ui) {
					$("input[name=schoolName]").val(ui.item.label); // display the selected text
					$("input[name=schoolID]").val(ui.item.id); // save selected id to hidden input
				}
			});
			
			
			$(".widget-body").show();
			$(".alert-danger").hide();
			
			//bootbox.confirm("<h4>Sila log masuk untuk melakukan input data</h4>\
			//	<table><tr><td>ID Pengguna</td><td>:&nbsp;</td><td><input type='text' name='username' style='margin:5px;' /></td></tr>\
			//	<tr><td>Kata Laluan</td><td>:&nbsp;</td><td><input type='password' name='password' style='margin:5px;' /></td></tr></table>\
			//	", function(result) {
			//		if(result == true){
			//			var uname = $("input[name=username]").val();
			//			var pwd = $("input[name=password]").val();
			//			
			//			var datastr = '{"mode":"LogIn","Username":"'+uname+'","Password":"'+pwd+'"}';
			//			$.ajax({
			//				url: "<?php echo base_url();?>main/ajax",
			//				type: "POST",
			//				data: {"datastr":datastr},
			//				success: function(data){
			//					if(data == "Gagal"){
			//						$(".widget-body").hide();
			//						$(".alert-danger").show();
			//					}else{
			//						$(".widget-body").show();
			//						$(".alert-danger").hide();
			//						$("input[name=IDPengguna]").val(data);
			//					}
			//				}
			//			});	
			//		}else{
			//			$(".widget-body").show();
			//			$(".alert-danger").hide();
			//		}
			//});
		});
	</script>
	<style>
	.ui-autocomplete {
		max-height: 300px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		z-index:3;
	}
	
	div.popupTitle{
		display: none;
		font-family: Arial, Helvetica, sans-serif;
		background-color:white;
		width:auto;
		left:20px;
		text-align:left;
		color:black;
		padding:5px;
		border-radius:5px;
		z-index:3;
		position: absolute;
	}
	.aPop:hover div.popupTitle{
		display: block;
		position: absolute;
		font-family: Arial, Helvetica, sans-serif;
		background-color:white;
		width:auto;
		right:50px;
		text-align:left;
		color:black;
		padding:5px;
		border-radius:5px;
	}
	</style>
	<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
    </script>
	<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
    </script>
	<body onload="MM_preloadImages('../s2s/assets/images/Info32x32.png','../s2s/assets/images/Info.png')">
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
									<div class="alert alert-danger" style="display:none;">
										<strong>
											<i class="ace-icon fa fa-times"></i>
											Harap maaf!
										</strong>
										Anda tiada akses untuk input data.
										<br />
										<br />
										<button class="btn btn-sm btn-info">
											Log Masuk
											<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
										</button>
									</div>

									<div class="widget-body" style="display:none;">
										<div class="widget-main no-padding">
											<form class="form-horizontal" role="form" method="post" action="process/processdata" enctype="multipart/form-data">
											<br/>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> ID Pengguna </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="200" border="0">
										              <tr>
										                <td><input type="text" disabled name="IDPengguna"/></td>
										                <td>&nbsp;</td>
										                <td></td>
									                  </tr>
										              </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sekolah </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="530" border="0">
										              <tr>
										                <td>
															<input name="schoolName" type="text" class="form-control" placeholder="Taip dan Pilih Nama Sekolah" />
															<input name="schoolID" type="hidden" />
														 </td>
										                <td>&nbsp;</td>
										                <td></td>
									                  </tr>
										              </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Number of lanes </label>
												<div class="col-sm-5">
												  <div class="input-group col-sm-12">
												    <table width="243" border="0">
										              <tr>
										                <td width="206"><select name="NOL" class="form-control" value="<?php echo set_value('NOL'); ?>">
										                  <option value=""> --Please Select-- </option>
															<option value="One:1"> One </option>
															<option value="Two:2.8"> Two </option>
															<option value="Three:5.2"> Three </option>
															<option value="Four or more:8"> Four or more </option>
															<option value="Two and one:1.8"> Two and one </option>
															<option value="Three and two:4"> Three and two </option>
									                    </select></td>
										                <td width="6">&nbsp;</td>
										                <td>
															<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<div class="popupTitle">
																	<img src="<?php echo base_url();?>assets/images/lanes_number.gif"/>
																</div>
															</a>
														</td>
														</tr>
									                </table>
												</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Median Type </label>
												<div class="col-sm-5">
												  <div class="input-group col-sm-12">
												    <table width="406" border="0">
													    <tr>
															    <td width="370"><select name="MT" class="form-control">
															      <option value=""> --Please Select-- </option>
																<option value="Safety barrier - metal:1"> Safety barrier - metal </option>
																<option value="Safety barrier - concrete:1"> Safety barrier - concrete </option>
																<option value="Physical median width >=20m:1"> Physical median width >=20m </option>
																<option value="Physical median width 10 to <20m:1"> Physical median width 10 to <20m </option>
																<option value="Physical median width 5 to <10m:1"> Physical median width 5 to <10m </option>
																<option value="Physical median width 1 to <5m:1"> Physical median width 1 to <5m </option>
																<option value="Physical median width 0 to <1m:1.6"> Physical median width 0 to <1m </option>
																<option value="Continuous central turning lane:3"> Continuous central turning lane </option>
																<option value="Flexible posts:2.7"> Flexible posts </option>
																<option value="Central hatching:2.4"> Central hatching (>1m) </option>
																<option value="Centre line:3"> Centre line </option>
																<option value="Safety barrier - motorcycle friendly:1"> Safety barrier - motorcycle friendly </option>
																<option value="One way:1"> One way </option>
																<option value="Wide centre line (0.3m to 1m):2.7"> Wide centre line (0.3m to 1m) </option>
																<option value="Safety barrier - wire rope:1"> Safety barrier - wire rope </option>
														        </select></td>
															    <td width="10">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
															    
												      </tr>
												    </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sidewalk - Driver Side </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="451" border="0">
											            <tr>
											              <td width="414"><select name="SWDS" class="form-control">
											               <option value=""> --Please Select-- </option>
																<option value="Physical Barrier:0"> Physical Barrier </option>
																<option value="Non-physical separation ≥ 3.0m:0.075"> Non-physical separation ≥ 3.0m </option>
																<option value="Non-physical separation 1.0m to <3.0m:0.09"> Non-physical separation 1.0m to <3.0m </option>
																<option value="Non-physical separation 0m to <1.0m:0.1"> Non-physical separation 0m to <1.0m </option>
																<option value="None:20"> None </option>
																<option value="Informal path ≥ 1.0m:5"> Informal path ≥ 1.0m </option>
																<option value="Informal path 0m to <1.0m:6"> Informal path 0m to <1.0m </option>
										                  </select></td>
											              <td width="6">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
											              
										                </tr>
										              </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sidewalk - Passenger Side </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="451" border="0">
											            <tr>
											              <td width="414"><select name="SWPS" class="form-control">
											                <option value=""> --Please Select-- </option>
																<option value="Physical Barrier:0"> Physical Barrier </option>
																<option value="Non-physical separation ≥ 3.0m:0.075"> Non-physical separation ≥ 3.0m </option>
																<option value="Non-physical separation 1.0m to <3.0m:0.09"> Non-physical separation 1.0m to <3.0m </option>
																<option value="Non-physical separation 0m to <1.0m:0.1"> Non-physical separation 0m to <1.0m </option>
																<option value="None:20"> None </option>
																<option value="Informal path ≥ 1.0m:5"> Informal path ≥ 1.0m </option>
																<option value="Informal path 0m to <1.0m:6"> Informal path 0m to <1.0m </option>
										                  </select></td>
											              <td width="6">&nbsp;</td>
											              <td width="17">&nbsp;</td>
										                </tr>
										              </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Curvature </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="322" border="0">
											            <tr>
											              <td width="285"><select name="Curvature" class="form-control">
											                <option value=""> --Please Select-- </option>
																<option value="Straight or gently curving:1"> Straight or gently curving </option>
																<option value="Moderate:1.8"> Moderate </option>
																<option value="Sharp:3.5"> Sharp </option>
																<option value="Very Sharp:6"> Very Sharp </option>
										                  </select></td>
											              <td width="6">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/selekoh.jpg"/>
																		</div>
																	</a>
																</td>
											              
										                </tr>
										              </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Quality of Curve </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="206"><select name="QOC" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Adequate:1"> Adequate </option>
																<option value="Poor:1.25"> Poor </option>
																<option value="Not Applicable:1"> Not Applicable </option>
												                </select></td>
													            <td width="132">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Sight Distance </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="SD" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Adequate:1"> Adequate </option>
																<option value="Poor:1.42"> Poor </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Lane Width </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="359" border="0">
													          <tr>
													            <td width="345"><select name="LW" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Wide (>= 3.25m):1"> Wide (≥ 3.25m) </option>
																<option value="Medium (>= 2.75m to < 3.25m):1.2"> Medium (≥ 2.75m to < 3.25m) </option>
																<option value="Narrow (>= 0m to < 2.75m):1.5"> Narrow (≥ 0m to < 2.75m) </option>
												                </select></td>
													            <td width="5">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/lebar_jalan.jpg"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Delineation </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="Delineation" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Adequate:1"> Adequate </option>
																<option value="Poor:1.2"> Poor </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Grade </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="327"><select name="Grade" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value=">= 0% to <7.5%:1"> ≥ 0% to <7.5% </option>
																<option value=">= 7.5% to <10%:1.2"> ≥ 7.5% to <10% </option>
																<option value=">= 10%:1.7"> ≥ 10% </option>
												                </select></td>
													            <td width="7">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Road condition </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="RC" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Good:1"> Good </option>
																<option value="Medium:1.2"> Medium </option>
																<option value="Poor:1.4"> Poor </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Skid Resistance / Grip </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="281" border="0">
													          <tr>
													            <td width="333"><select name="SRG" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Sealed - adequate:1"> Sealed - adequate </option>
																<option value="Sealed - medium:1.4"> Sealed - medium </option>
																<option value="Sealed - poor:2"> Sealed - poor </option>
																<option value="Unsealed - adequate:3"> Unsealed - adequate </option>
																<option value="Unsealed - poor:5.5"> Unsealed - poor </option>
												                </select></td>
													            <td width="7">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Speed management / traffic calming </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="SMTC" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Not present:1.25"> Not present </option>
																<option value="Present:1"> Present </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Vehicle parking </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="VP" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Two sides:1.33"> Two sides </option>
																<option value="One side:1.2"> One side </option>
																<option value="None:1"> None </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Shoulder rumble strips </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="SRS" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Not present:1.25"> Not present </option>
																<option value="Present:1"> Present </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> School zone warning </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="406" border="0">
													          <tr>
													            <td width="370"><select name="SZW" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="School zone flashing beacons:0.9"> School zone flashing beacons </option>
																<option value="School zone static signs or road markings:0.95"> School zone static signs or road markings </option>
																<option value="No school zone warning:1"> No school zone warning </option>
																<option value="Not applicable (no school at the location):1"> Not applicable (no school at the location) </option>
												                </select></td>
													            <td width="10">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Street lighting </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="SL" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Not present:1.25"> Not present </option>
																<option value="Present:1"> Present </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Crossing Facilities </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="406" border="0">
													          <tr>
													            <td width="370"><select name="PCF" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Grade separated facility:0.4"> Grade separated facility </option>
																<option value="Signalised with refuge:1"> Signalised with refuge </option>
																<option value="Signalised without refuge:1.25"> Signalised without refuge </option>
																<option value="Unsignalised marked crossing with refuge:3.8"> Unsignalised marked crossing with refuge </option>
																<option value="Unsignalised marked crossing without a refuge:4.8"> Unsignalised marked crossing without a refuge </option>
																<option value="Refuge only:5.1"> Refuge only </option>
																<option value="No facility:6.7"> No facility </option>
																<option value="Unsignalised raised marked crossing with refuge:2.5"> Unsignalised raised marked crossing with refuge </option>
																<option value="Unsignalised raised marked crossing without refuge:3.2"> Unsignalised raised marked crossing without refuge </option>
																<option value="Raised unmarked crossing with refuge:3.4"> Raised unmarked crossing with refuge </option>
																<option value="Raised unmarked crossing without refuge:4.5"> Raised unmarked crossing without refuge </option>
												                </select></td>
													            <td width="10">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Crossing Quality </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="PCQ" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Adequate:1"> Adequate </option>
																<option value="Poor:1.5"> Poor </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Intersection Type </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="406" border="0">
													          <tr>
													            <td width="370"><select name="IT" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Merge lane:1.05"> Merge lane </option>
																<option value="Roundabout:1.5"> Roundabout </option>
																<option value="3-leg unsignalised with protected turn lane:1.1"> 3-leg unsignalised with protected turn lane </option>
																<option value="3-leg unsignalised with no protected turn lane:1.1"> 3-leg unsignalised with no protected turn lane </option>
																<option value="3-leg signalised with protected turn lane:1.1"> 3-leg signalised with protected turn lane </option>
																<option value="3-leg signalised with no protected turn lane:1.1"> 3-leg signalised with no protected turn lane </option>
																<option value="4-leg unsignalised with protected turn lane:1.2"> 4-leg unsignalised with protected turn lane </option>
																<option value="4-leg unsignalised with no protected turn lane:1.2"> 4-leg unsignalised with no protected turn lane </option>
																<option value="4-leg signalised with protected turn lane:1.2"> 4-leg signalised with protected turn lane </option>
																<option value="4-leg signalised with no protected turn lane:1.2"> 4-leg signalised with no protected turn lane </option>
																<option value="None:1"> None </option>
																<option value="Railway Crossing - passive (signs only):1"> Railway Crossing - passive (signs only) </option>
																<option value="Railway Crossing - active (flashing lights / boom gates):1"> Railway Crossing - active (flashing lights / boom gates) </option>
																<option value="Median crossing point - informal:1.1"> Median crossing point - informal </option>
																<option value="Median crossing point - formal:1.1"> Median crossing point - formal </option>
																<option value="Mini roundabout:1.3"> Mini roundabout </option>
												                </select></td>
													            <td width="10">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Intersection Quality </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="IQ" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="Adequate:1"> Adequate </option>
																<option value="Poor:1.2"> Poor </option>
																<option value="Not Applicable:1"> Not Applicable </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Pedestrian Fencing </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="PF" class="form-control">
													             <option value=""> --Please Select-- </option>
																<option value="Not present:1.25"> Not present </option>
																<option value="Present:1"> Present</option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> External Flow Influence </label>
												<div class="col-sm-5">
												  <table width="252" border="0">
												      <tr>
												        <td width="331"><input name="EFI" type="text" id="form-field-1" class="col-sm-12" placeholder="Number of lanes and AADT" /></td>
												        <td width="7">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/pembahagi_jalan.png"/>
																		</div>
																	</a>
																</td>
												        
											        </tr>
											      </table>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Operating Speed (85th percentile) </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
													  <table width="242" border="0">
													          <tr>
													            <td width="330"><select name="OS85P" class="form-control">
													              <option value=""> --Please Select-- </option>
																<option value="<30km/h:0"> <30km/h </option>
																<option value="35km/h:0.04"> 35km/h </option>
																<option value="40km/h:0.05"> 40km/h </option>
																<option value="45km/h:0.08"> 45km/h </option>
																<option value="50km/h:0.12"> 50km/h </option>
																<option value="55km/h:0.18"> 55km/h </option>
																<option value="60km/h:0.25"> 60km/h </option>
																<option value="65km/h:0.3"> 65km/h </option>
																<option value="70km/h:0.4"> 70km/h </option>
																<option value="75km/h:0.49"> 75km/h </option>
																<option value="80km/h:0.55"> 80km/h </option>
																<option value="85km/h:0.56"> 85km/h </option>
																<option value="90km/h:0.6"> 90km/h </option>
																<option value="95km/h:0.63"> 95km/h </option>
																<option value="100km/h:0.66"> 100km/h </option>
																<option value="105km/h:0.7"> 105km/h </option>
																<option value="110km/h:0.74"> 110km/h </option>
																<option value="115km/h:0.76"> 115km/h </option>
																<option value="120km/h:0.8"> 120km/h </option>
																<option value="125km/h:0.84"> 125km/h </option>
																<option value="130km/h:0.86"> 130km/h </option>
																<option value="135km/h:0.9"> 135km/h </option>
																<option value="140km/h:0.94"> 140km/h </option>
																<option value="145km/h:0.96"> 145km/h </option>
																<option value=">=150km/h:1"> >=150km/h </option>
												                </select></td>
													            <td width="8">&nbsp;</td>
																<td>
																	<a class="aPop" href="#" style="background-image:url('<?php echo base_url();?>assets/images/Info.png');background-size: 15px 16px;position:relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<div class="popupTitle">
																			<img src="<?php echo base_url();?>assets/images/selekoh.jpg"/>
																		</div>
																	</a>
																</td>
													            
											            </tr>
											          </table>
													</div>
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