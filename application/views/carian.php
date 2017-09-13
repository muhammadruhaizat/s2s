	<?php header('Access-Control-Allow-Origin: *'); ?>
	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>

			<script type="text/javascript">
			$( document ).ready(function() {
				var myTable = $('#dynamic-table').DataTable();
				
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
						</table>
						<br/>
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
														<th>Kod Sekolah</th>
														<th>Nama Sekolah</th>
														<th>Alamat</th>
														<th>Bandar Surat</th>
														<th>Negeri</th>
														<th>Penarafan</th>
													</tr>
												</thead>

												<tbody>
													<?php $i=0; foreach($senarai_sekolah as $eachSekolah): $i++;?>
													<tr>
														<td class="center"><?php echo $i;?></td>
														<td><?php echo $eachSekolah->KodSekolah;?></td>
														<td><?php echo $eachSekolah->NamaSekolah;?></td>
														<td><?php echo $eachSekolah->AlamatSurat;?></td>
														<td><?php echo $eachSekolah->BandarSurat;?></td>
														<td><?php echo $eachSekolah->Negeri;?></td>
														<td class="center"><?php if(isset($eachSekolah->star_rate)):?><span><?php if($eachSekolah->star_rate == 1): echo "<img style='width:80px;' src='".base_url()."assets/images/1-star.png'/>"; elseif($eachSekolah->star_rate == 2): echo "<img style='width:80px;' src='".base_url()."assets/images/2-star.png'/>";elseif($eachSekolah->star_rate == 3): echo "<img style='width:80px;' src='".base_url()."assets/images/3-star.png'/>";elseif($eachSekolah->star_rate == 4): echo "<img style='width:80px;' src='".base_url()."assets/images/4-star.png'/>";elseif($eachSekolah->star_rate == 5): echo "<img style='width:80px;' src='".base_url()."assets/images/5-star.png'/>";endif;?></span> (<?php echo $eachSekolah->star_rate;?>/5)<?php else:?><strong>-</strong><?php endif;?></td>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>