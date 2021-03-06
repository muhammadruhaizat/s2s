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

			$query 	= $this->db->query("SELECT * FROM `senarai_sekolah` WHERE KodSekolah = '".$KodSekolah."'");
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

			$query = $this->db->query("SELECT * FROM `assessment` WHERE IDSchool = '".$KodSekolah."'");

			$row = $query->row();

				if (isset($row))
					{
        				$star_value = $row->star_rate;
					}
				else{
        				$star_value = 0;
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
			} else if ($star_value == '0') { ?>
				<img src="<?php echo base_url();?>/assets/images/0-star.jpeg" style="width:500px;"/>
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
								Road Safety Assessment Details
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#dmapoverall">
								Suggestion for Improvements
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
						
						<div id="dmapx" class="tab-pane fade">

						<?php
							$query = $this->db->query("SELECT * FROM `assessment_text` WHERE IDSchool = '".$KodSekolah."'");

							$row = $query->row();

							if (isset($row))
								{
        							$NOLD = $row->NOL;
        							$MTD = $row->MT;
        							$SWDSD = $row->SWDS;
        							$SWPSD = $row->SWPS;
        							$curvatureD = $row->Curvature;
        							$QOCD = $row->QOC;
        							$SDD = $row->SD;
        							$LWD = $row->LW;
        							$DelineationD = $row->Delineation;
        							$GradeD = $row->Grade;
        							$RCD = $row->RC;
        							$SRGD = $row->SRG;
        							$SMTCD = $row->SMTC;
        							$VPD = $row->VP;
        							$SRSD = $row->SRS;
        							$SZWD = $row->SZW;
        							$SLD = $row->SL;
        							$PCFD = $row->PCF;
        							$PCQD = $row->PCQ;
        							$ITD = $row->IT;
        							$IQD = $row->IQ;
        							$PFD = $row->PF;
        							$EFID = $row->EFI;
        							$OS85PD = $row->OS85P;
        							$ADSSRSD = $row->ADSSRS;
        							$APSSRSD = $row->APSSRS;
        							$CIRSRSD = $row->CIRSRS;
        							$CSRSRSD = $row->CSRSRS;
        							$AV_WalkD = $row->AV_Walk;
        							$SRD = $row->SR;
        							$star_rateD = $row->star_rate;
        							$TSD = $row->TS;
								}else{
        							$NOLD 			= "N/A";
        							$MTD 			= "N/A";
        							$SWDSD 			= "N/A";
        							$SWPSD 			= "N/A";
        							$curvatureD 	= "N/A";
        							$QOCD			= "N/A";
        							$SDD 			= "N/A";
        							$LWD 			= "N/A";
        							$DelineationD 	= "N/A";
        							$GradeD 		= "N/A";
        							$RCD 			= "N/A";
        							$SRGD 			= "N/A";
        							$SMTCD 			= "N/A";
        							$VPD 			= "N/A";
        							$SRSD 			= "N/A";
        							$SZWD 			= "N/A";
        							$SLD 			= "N/A";
        							$PCFD 			= "N/A";
        							$PCQD 			= "N/A";
        							$ITD 			= "N/A";
        							$IQD 			= "N/A";
        							$PFD 			= "N/A";
        							$EFID 			= "N/A";
        							$OS85PD 		= "N/A";
        							$ADSSRSD 		= "N/A";
        							$APSSRSD 		= "N/A";
        							$CIRSRSD 		= "N/A";
        							$CSRSRSD 		= "N/A";
        							$AV_WalkD 		= "N/A";
        							$SRD 			= "N/A";
        							$star_rateD 	= "N/A";
        							$TSD 			= "N/A";
								}							

						?>

						<div class="tg-wrap"><table class="tg">
						  <tr>
						    <th class="tg-9hbo">Number of lanes</th>
						    <th class="tg-yw4l"><?php echo $NOLD ?></th>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Median Type</td>
						    <td class="tg-yw4l"><?php echo $MTD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Sidewalk - Driver Side</td>
						    <td class="tg-yw4l"><?php echo $SWDSD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Sidewalk - Passenger Side</td>
						    <td class="tg-yw4l"><?php echo $SWPSD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Curvature</td>
						    <td class="tg-yw4l"><?php echo $curvatureD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Quality of Curve</td>
						    <td class="tg-yw4l"><?php echo $QOCD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Sight Distance</td>
						    <td class="tg-yw4l"><?php echo $SDD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Lane Width</td>
						    <td class="tg-yw4l"><?php echo $LWD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Delineation</td>
						    <td class="tg-yw4l"><?php echo $DelineationD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Grade</td>
						    <td class="tg-yw4l"><?php echo $GradeD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Road Condition</td>
						    <td class="tg-yw4l"><?php echo $RCD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Skid Resistance / Grip</td>
						    <td class="tg-yw4l"><?php echo $SRGD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Speed Management / Traffic Calming</td>
						    <td class="tg-yw4l"><?php echo $SMTCD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Vehicle Parking</td>
						    <td class="tg-yw4l"><?php echo $VPD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Shoulder Rumble Strips</td>
						    <td class="tg-yw4l"><?php echo $SRSD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">School Zone Warning</td>
						    <td class="tg-yw4l"><?php echo $SZWD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Street Lighting</td>
						    <td class="tg-yw4l"><?php echo $SLD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Pedestrian Crossing Facilities</td>
						    <td class="tg-yw4l"><?php echo $PCFD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Pedestrian Crossing Quality</td>
						    <td class="tg-yw4l"><?php echo $PCQD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Intersection Type</td>
						    <td class="tg-yw4l"><?php echo $ITD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Intersection Quality</td>
						    <td class="tg-yw4l"><?php echo $IQD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Pedestrian Fencing</td>
						    <td class="tg-yw4l"><?php echo $PFD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">External Flow Influence</td>
						    <td class="tg-yw4l"><?php echo $EFID ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Operating Speed (85th percentile)</td>
						    <td class="tg-yw4l"><?php echo $OS85PD ?></td>
						  </tr>
						  <tr>
						    <td class="tg-9hbo">Date of Assessment</td>
						    <td class="tg-yw4l"><?php echo $TSD ?></td>
						  </tr>
						</table></div>



						</div>
							
						<div id="dmapoverall" class="tab-pane fade">

						<?php

							$improve = array();

							$query = $this->db->query("SELECT * FROM `assessment` WHERE IDSchool = '".$KodSekolah."'");

							$row = $query->row();

							if (isset($row))
								{
        							$MT = $row->MT;
        								if ($MT > 1.6) {
        									array_push($improve, 'Median Type');
        								}
        							$SWDS = $row->SWDS;
        								if ($SWDS > 0.1) {
        									array_push($improve, 'Sidewalk (Driver Side) - Consider installing physical barrier or non-physical separation with size > 1 meter');
        								}
        							$SWPS = $row->SWPS;
        								if ($SWPS > 0.1) {
        									array_push($improve, 'Sidewalk (Passenger Side) - Consider installing physical barrier or non-physical separation with size > 1 meter');
        								}
        							$curvature = $row->Curvature;
        								if ($curvature > 0.1) {
        									array_push($improve, 'Curvature - Improvement for straight/gently curving or at least moderate');
        								}
        							$Delineation = $row->Delineation;
        								if ($Delineation > 0.1) {
        									array_push($improve, 'Delineation - Ensure adequate delineation exists');
        								}
        							$Grade = $row->Grade;
        								if ($Grade > 0.1) {
        									array_push($improve, 'Grade - At least < 10%');
        								}
        							$RC = $row->RC;
        								if ($RC > 0.1) {
        									array_push($improve, 'Road condition - Ensure good road condition');
        								}
        							$SRG = $row->SRG;
        								if ($SRG > 0.1) {
        									array_push($improve, 'Skid Resistance / Grip - Suggested to be at least sealed at medium level');
        								}
        							$SMTC = $row->SMTC;
        								if ($SMTC > 0.1) {
        									array_push($improve, 'Speed management / traffic calming - Deploy traffic calming countermeasures');
        								}
        							$VP = $row->VP;
        								if ($VP > 0.1) {
        									array_push($improve, 'Vehicle parking - remove vehicle parking');
        								}
        							$SRS = $row->SRS;
        								if ($SRS > 0.1) {
        									array_push($improve, 'Shoulder rumble strips - Consider deploying this countermeasure');
        								}
        							$SL = $row->SL;
        								if ($SL > 0.1) {
        									array_push($improve, 'Street lighting - Consider deploying this countermeasure');
        								}
        							$PCF = $row->PCF;
        								if ($PCF > 0.1) {
        									array_push($improve, 'Pedestrian Crossing Facilities - Recommended for at grade seperated facility or signalised with refuge');
        								}
        							$PCQ = $row->PCQ;
        								if ($PCQ > 0.1) {
        									array_push($improve, 'Pedestrian Crossing Quality - Ensure adequate quality');
        								}
        							$PF = $row->PF;
        								if ($PF > 0.1) {
        									array_push($improve, 'Pedestrian Fencing - Consider deploying this countermeasure');
        								}
        							$star_rate = $row->star_rate;
        								if ($star_rate > 4) {
        									$message = 'Congratulations of achieving 5 star rating. Other improvement items for your consideration';
        								} else {
        									$message = 'Suggested list of items for improvements';
        								}

								}else{
        									$message = 'N/A';
								}

								$max = count($improve); ?>

								<div class="tg-wrap"; style="text-align:center;">


								<header>
  									<h2><?php echo $message; ?></h2>
								</header>

								<table class="tg">

								<?php
								for ($i = 0; $i < $max; $i++)
								{
								    echo '<tr>';
								    echo "<td>{$improve[$i]}</td>";
								    echo '</tr>';
								}
								echo '</table></div>';								

						?>


							
							
						</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>