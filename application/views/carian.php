	<?php header('Access-Control-Allow-Origin: *'); ?>
	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>

			<script type="text/javascript">
			$( document ).ready(function() {
				var myTable = $('#dynamic-table').DataTable();
				
				$('input[name=txtSearch]').keyup( function() {
					myTable.search($(this).val()).draw() ;
				} );
				
				$('.selBandarSurat').change( function() {
					var selBandarSurat = this.value;
					
					if($(".selBandarSurat option:selected").text() != "--Sila pilih bandar surat--"){
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
						var datastr = '{"mode":"GetDaerahAll"}';
						$.ajax({
							url: "<?php echo base_url();?>main/ajax",
							type: "POST",
							data: {"datastr":datastr},
							success: function(data){
								$('.selBandarSurat option').remove();
								$('.selBandarSurat').append('<option>--Sila pilih bandar surat--</option>');
								
								var decodedData = JSON.parse(data);
								
								var senaraiDaerah = [];												
								
								for (var i = 0; i < decodedData.length; i++){
								  var obj = decodedData[i];
									$('.selBandarSurat').append('<option>'+obj["BandarSurat"]+'</option>');
								}
							}
						});	
					}else{
						var datastr = '{"mode":"GetDaerahByNegeri","Negeri":"'+selNegeri+'"}';
						$.ajax({
							url: "<?php echo base_url();?>main/ajax",
							type: "POST",
							data: {"datastr":datastr},
							success: function(data){
								$('.selBandarSurat option').remove();
								$('.selBandarSurat').append('<option>--Sila pilih bandar surat--</option>');
								
								var decodedData = JSON.parse(data);
								
								var senaraiDaerah = [];												
								
								for (var i = 0; i < decodedData.length; i++){
								  var obj = decodedData[i];
									$('.selBandarSurat').append('<option>'+obj["BandarSurat"]+'</option>');
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

					if($(".selBandarSurat option:selected").text() != "--Sila pilih bandar surat--"){
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
							<li class="active">Carian Sekolah</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Carian Sekolah
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									cari
								</small>
							</h1>
						</div><!-- /.page-header -->
						<table>
							<tr>
								<td>Negeri</td>
								<td>&nbsp;:</td>
								<td style="padding:5px;">
									<select class="selNegeri">
										<option>--Sila pilih negeri--</option>
										<?php foreach($senarai_negeri as $eachNegeri):?>
										<option><?php echo $eachNegeri->Negeri;?></option>
										<?php endforeach;?>
									</select>								
								</td>
							</tr>
							<tr>
								<td>Bandar Surat</td>
								<td>&nbsp;:</td>
								<td style="padding:5px;">
									<select class="selBandarSurat">
										<option>--Sila pilih bandar surat--</option>
										<?php foreach($senarai_bandar_surat as $eachBandarSurat):?>
										<option><?php echo $eachBandarSurat->BandarSurat;?></option>
										<?php endforeach;?>
									</select>								
								</td>
							</tr>
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
											Senarai Sekolah
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">#</th>
														<th class="center">Kod Sekolah</th>
														<th class="center">Nama Sekolah</th>
														<th class="center">Alamat</th>
														<th class="center">Bandar Surat</th>
														<th class="center">Negeri</th>
														<th class="center">Penarafan</th>
													</tr>
												</thead>

												<tbody>
													<?php $i=0; foreach($senarai_sekolah as $eachSekolah): $i++;?>
													<tr>
														<td style="width:5%;" class="center"><?php echo $i;?></td>
														<td style="width:10%;" class="center"><a target="_blank" href="<?php echo base_url();?>process/processFromCarian/<?php echo $eachSekolah->KodSekolah;?>"><?php echo $eachSekolah->KodSekolah;?><a/></td>
														<td style="width:25%;"><?php echo $eachSekolah->NamaSekolah;?></td>
														<td style="width:25%;"><?php echo $eachSekolah->AlamatSurat;?></td>
														<td style="width:10%;"><?php echo $eachSekolah->BandarSurat;?></td>
														<td style="width:10%;"><?php echo $eachSekolah->Negeri;?></td>
														<td style="width:15%;" class="center">
														<?php if(isset($eachSekolah->star_rate)):?><span><a target="_blank" href="<?php echo base_url();?>process/processFromCarian/<?php echo $eachSekolah->KodSekolah;?>"><img alt="Klik untuk maklumat terperinci" style='width:80px;' src='<?php echo base_url();?>assets/images/<?php if($eachSekolah->star_rate == 1): echo "1-star.png"; elseif($eachSekolah->star_rate == 2): echo "2-star.png";elseif($eachSekolah->star_rate == 3): echo "3-star.png";elseif($eachSekolah->star_rate == 4): echo "4-star.png";elseif($eachSekolah->star_rate == 5): echo "5-star.png";endif;?>'/></a></span> (<?php echo $eachSekolah->star_rate;?>/5)<?php else:?><strong>-</strong><?php endif;?></td>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>