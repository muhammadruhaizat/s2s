	<?php header('Access-Control-Allow-Origin: *'); ?>
	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>

			<script type="text/javascript">
			$( document ).ready(function() {
				var myTable = $('#dynamic-table').DataTable(
				{"oLanguage": {
					"sLengthMenu": "Papar _MENU_ rekod",
					"sInfo": "Papar _START_ hingga _END_ dari _TOTAL_ data",
					"oPaginate": {
						"sFirst": "Pertama",
						"sLast": "Terakhir",
						"sNext": "Seterusnya",
						"sPrevious": "Sebelumnya"
					},
					"sInfoFiltered": "(tapis dari _MAX_ data)"
				}});
				
				$('input[name=txtSearch]').keyup( function() {
					myTable.search($(this).val()).draw() ;
				} );
				
				$('.selBandarSurat').change( function() {
					var selBandarSurat = this.value;
					
					if($(".selBandarSurat option:selected").text() != "--Sila pilih daerah--"){
						myTable
							.column(4)
							.search(selBandarSurat)
							.draw();
					}else{
						myTable
							.column(4)
							.search("")
							.draw();
					}
						
					if($(".selNegeri option:selected").text() != "--Sila pilih negeri--"){
						var selNegeri = $(".selNegeri option:selected").text();
						
						myTable
							.column(5)
							.search(selNegeri)
							.draw();						
					}
				});
				
				$('.selNegeri').change( function() {
					var selNegeri = this.value;
					
					if(selNegeri == "--Sila pilih negeri--"){
						var datastr = '{"mode":"BasGetDaerahAll"}';
						$.ajax({
							url: "<?php echo base_url();?>main/ajax",
							type: "POST",
							data: {"datastr":datastr},
							success: function(data){
								$('.selBandarSurat option').remove();
								$('.selBandarSurat').append('<option>--Sila pilih daerah--</option>');
								
								var decodedData = JSON.parse(data);
								
								var senaraiDaerah = [];												
								
								for (var i = 0; i < decodedData.length; i++){
								  var obj = decodedData[i];
									$('.selBandarSurat').append('<option>'+obj["daerah"]+'</option>');
								}
							}
						});	
					}else{
						var datastr = '{"mode":"BasGetDaerahByNegeri","Negeri":"'+selNegeri+'"}';
						$.ajax({
							url: "<?php echo base_url();?>main/ajax",
							type: "POST",
							data: {"datastr":datastr},
							success: function(data){
								$('.selBandarSurat option').remove();
								$('.selBandarSurat').append('<option>--Sila pilih daerah--</option>');
								
								var decodedData = JSON.parse(data);
								
								var senaraiDaerah = [];												
								
								for (var i = 0; i < decodedData.length; i++){
								  var obj = decodedData[i];
									$('.selBandarSurat').append('<option>'+obj["daerah"]+'</option>');
								}
							}
						});						
					}

					
					
					if($(".selNegeri option:selected").text() != "--Sila pilih negeri--"){
						myTable
							.column(5)
							.search(selNegeri)
							.draw();						
					}else{
						myTable
							.column(5)
							.search("")
							.draw();						
					}

					if($(".selBandarSurat option:selected").text() != "--Sila pilih daerah--"){
						var selBandarSurat = $(".selBandarSurat option:selected").text();
						
						myTable
							.column(4)
							.search(selBandarSurat)
							.draw();						
					}
				});
			});
			</script>
			<style>
				#dynamic-table_filter
				{
					display: none;
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
						<table>
							<?php if(isset($daerahStr) == false):?>
							<tr>
								<td>Negeri</td>
								<td>&nbsp;:</td>
								<td style="padding:5px;">
									<select class="selNegeri">
										<option>--Sila pilih negeri--</option>
										<?php foreach($senarai_negeri as $eachNegeri):?>
										<option><?php echo $eachNegeri->negeri;?></option>
										<?php endforeach;?>
									</select>								
								</td>
							</tr>
							<tr>
								<td>Daerah</td>
								<td>&nbsp;:</td>
								<td style="padding:5px;">
									<select class="selBandarSurat">
										<option>--Sila pilih daerah--</option>
										<?php foreach($senarai_bandar_surat as $eachBandarSurat):?>
										<option><?php echo $eachBandarSurat->daerah;?></option>
										<?php endforeach;?>
									</select>								
								</td>
							</tr>
							<?php endif;?>
							<tr>
								<td>Carian Bebas</td>
								<td>&nbsp;:</td>
								<td style="padding:5px;">
									<input type="text" name="txtSearch" placeholder="Masukkan apa-apa karakter" style="width:220px;" />
								</td>
							</tr>
						</table>
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
														<th class="center">#</th>
														<th class="center">Nama Syarikat</th>
														<th class="center">No Kenderaan</th>
														<th class="center">Kelas Lesen</th>
														<th class="center">Daerah</th>
														<th class="center">Negeri</th>
													</tr>
												</thead>

												<tbody>
													<?php $i=0; foreach($senarai_pengendali_bas as $eachSekolah): $i++;?>
													<tr>
														<td style="width:5%;" class="center"><?php echo $i;?></td>
														<!--<td style="width:35%;" class="center"><a target="_blank" href="<?php echo base_url();?>process/processFromCarian/<?php echo $eachSekolah->ID;?>"><?php echo $eachSekolah->nama_syarikat;?><a/></td>-->
														<td style="width:35%;" class="center"><?php echo $eachSekolah->nama_syarikat;?></td>
														<td style="width:15%;"><?php echo $eachSekolah->no_kenderaan;?></td>
														<td style="width:15%;"><?php echo $eachSekolah->kelas_lesen;?></td>
														<td style="width:15%;"><?php echo $eachSekolah->daerah;?></td>
														<td style="width:15%;"><?php echo $eachSekolah->negeri;?></td>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>