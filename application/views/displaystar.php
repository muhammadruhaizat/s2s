	<?php $this->load->view('header'); ?>


<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li class="active">Analysis</li>
		</ul><!-- /.breadcrumb -->
	</div>
  <style type="text/css">
    
 header {background: grey;color:white;}
.tg  {border-collapse:collapse;border-spacing:0;border-width:1px;border-style:solid;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-9hbo{font-weight:bold;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}


   </style>

	<div class="page-content">
		<div class="page-header">
			<h1>
				Analysis
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					result &amp; stats
				</small>
			</h1>
		</div><!-- /.page-header -->

		<?php

			$query 	= $this->db->query("SELECT * FROM `senarai_sekolah` LIMIT 1");
			foreach ($query->result_array() as $row)
				{
					$nama = $row['NamaSekolah'];
					$p_s = $row['PeringkatSekolah'];
					$PPD = $row['PPD'];
					$kodsek = $row['KodSekolah'];
					$alamat = $row['AlamatSurat'];
					$poskod = $row['PoskodSurat'];
					$bandar = $row['BandarSurat'];
					$negeri = $row['Negeri'];
					$notel = $row['NoTelefon'];
					$nofax = $row['NoFax'];
				}

			$query = $this->db->query("SELECT * FROM `assessment`");

			$row = $query->row();

				if (isset($row))
					{
        				$star_value = $row->star_rate;
					}

		?>
	<div id="mapDashboard" style="text-align:center;">
		<header>
  			<h1><?php echo $nama; ?></h1>
		</header>

		<?php

			if ($star_value == '5') { ?>
				<img src="<?php echo base_url();?>/assets/images/5-stars.jpeg" style="width:500px;"/>
				<?php
			} else if ($star_value == '4') { ?>
				<img src="<?php echo base_url();?>/assets/images/4-stars.jpeg" style="width:500px;"/>
				<?php
			} else if ($star_value == '3') { ?>
				<img src="<?php echo base_url();?>/assets/images/3-stars.jpeg" style="width:500px;"/>
				<?php
			} else if ($star_value == '2') { ?>
				<img src="<?php echo base_url();?>/assets/images/2-stars.jpeg" style="width:500px;"/>
				<?php
			} else if ($star_value == '1') { ?>
				<img src="<?php echo base_url();?>/assets/images/1-star.jpeg" style="width:500px;"/>
				<?php
			}
			?>
	</div>

		<div class="space-12"></div>
		<div class="row">
			<div class="col-sm-6" style="width:100%;height:100%;">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#statistic">
								Overview
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#dmapx">
								Safety Assessment
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#dmapoverall">
								Map Display
							</a>
						</li>
					</ul>
                                 
					<div class="tab-content">
						<div id="statistic" class="tab-pane fade in active">
							

								<table class="tg">
  								<tr>
    								<th class="tg-9hbo">Peringkat sekolah</th>
    								<th class="tg-yw4l"><?php echo $p_s; ?></th>
  								</tr>
  								<tr>
    								<td class="tg-9hbo">PPD</td>
    								<td class="tg-yw4l"><?php echo $PPD; ?></td>
  								</tr>
  								<tr>
    								<td class="tg-9hbo">Kod sekolah</td>
    								<td class="tg-yw4l"><?php echo $kodsek; ?></td>
  								</tr>
  								<tr>
    								<td class="tg-9hbo">Alamat sekolah</td>
    								<td class="tg-yw4l"><?php echo $alamat; ?></td>
  								</tr>
  								<tr>
    								<td class="tg-9hbo">Poskod</td>
    								<td class="tg-yw4l"><?php echo $poskod; ?></td>
  								</tr>
  								<tr>
								    <td class="tg-9hbo">Bandar</td>
								    <td class="tg-yw4l"><?php echo $bandar; ?></td>
							  </tr>
							  <tr>
							    	<td class="tg-9hbo">Negeri</td>
							    	<td class="tg-yw4l"><?php echo $negeri; ?></td>
							  </tr>
							  <tr>
							    	<td class="tg-9hbo">No telefon</td>
							    	<td class="tg-yw4l"><?php echo $notel; ?></td>
							  </tr>
							  <tr>
							    	<td class="tg-9hbo">No fax</td>
							    	<td class="tg-yw4l"><?php echo $nofax; ?></td>
							  </tr>
							</table>


						</div>
						
						<div id="dmapx" class="fade">



						</div>
							
						<div id="dmapoverall" class="fade">


							
							
						</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>