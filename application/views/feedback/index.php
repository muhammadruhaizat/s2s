	<script type="text/javascript">
		jQuery(function($) {
			$('#id-input-file-1 , #id-input-file-2').ace_file_input({
				no_file:'No File ...',
				btn_choose:'Choose',
				btn_change:'Change',
				droppable:false,
				onchange:null,
				thumbnail:false //| true | large
				//whitelist:'gif|png|jpg|jpeg'
				//blacklist:'exe|php'
				//onchange:''
				//
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
					label: "<?php echo $eachSekolah->NamaSekolah.", ".$eachSekolah->PoskodSurat." ".$eachSekolah->BandarSurat.", ".$eachSekolah->Negeri." [ ID : ".$eachSekolah->KodSekolah." ]";?>",
					class: "<?php echo $eachSekolah->AlamatSurat.", ".$eachSekolah->PoskodSurat." ".$eachSekolah->BandarSurat.", ".$eachSekolah->Negeri;?>"
				});
			<?php endforeach;?>
			
			$('input[name=schoolName]').autocomplete({
				source: senaraiSekolah,
				select: function (event, ui) {
					$("input[name=schoolName]").val(ui.item.label); // display the selected text
					$("input[name=schoolID]").val(ui.item.id); // save selected id to hidden input
					$("input[name=alamatSekolah]").val(ui.item.class); // save selected id to hidden input
				}
			});
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
	</style>
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
								Feedback
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Submit
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">Enter Feedback</h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<form class="form-horizontal" role="form" method="post" action="feedback/processdata" enctype="multipart/form-data">
											<br/>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Kod Sekolah </label>
												<div class="col-sm-5">
													 <input name="schoolName" type="text" class="form-control" placeholder="Taip dan Pilih Nama Sekolah" />
                                                     <input name="schoolID" type="hidden" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Alamat Sekolah </label>
												<div class="col-sm-5">
													<input name="alamatSekolah" type="text" id="form-field-1" class="col-sm-12" placeholder="Jalan TKS 1" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Nama </label>
												<div class="col-sm-5">
													<input name="locationStr" type="text" id="form-field-1" class="col-sm-12" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Emel </label>
												<div class="col-sm-5">
													<input name="locationStr" type="text" id="form-field-1" class="col-sm-12" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> No. Telefon </label>
												<div class="col-sm-5">
													<input name="locationStr" type="text" id="form-field-1" class="col-sm-12" placeholder="" />
												</div>
											</div>
											<!--<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Riding Speed (KM/H) </label>
												<div class="col-sm-5">
													<div class="input-group col-sm-12">
															<select name="ridingSpeed" class="form-control">
																<option value=""> --Please Select Speed-- </option>
																<option value="10"> 10 </option>
																<option value="20"> 20 </option>
																<option value="30"> 30 </option>
																<option value="40"> 40 </option>
																<option value="50"> 50 </option>
															</select>
													</div>
												</div>
											</div>-->
											
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-center" for="form-field-1"> Feedback </label>
		
												<div class="col-sm-5">
													<textarea name="remarks" class="form-control" id="form-field-8" placeholder="Enter your feedback."></textarea>
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