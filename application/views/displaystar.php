	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				
			</script>
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Star Rating</li>
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

							<?php

							$query 	= $this->db->query("SELECT * FROM `senarai_sekolah` LIMIT 1");
							foreach ($query->result_array() as $row)
								{
        							echo $row['NamaSekolah'];
        							echo $row['PeringkatSekolah'];
        							echo $row['PPD'];
								}

								$star_value = $_COOKIE['star'];

								if ($star_value == '5') { ?>
                					<img src="<?php echo base_url();?>/assets/images/5-stars.jpg" style="width:500px;"/>
                					<?php
            					} else if ($star_value == '4') { ?>
                					<img src="<?php echo base_url();?>/assets/images/4-stars.jpg" style="width:500px;"/>
                					<?php
            					} else if ($star_value == '3') { ?>
                					<img src="<?php echo base_url();?>/assets/images/3-stars.jpg" style="width:500px;"/>
                					<?php
            					} else if ($star_value == '2') { ?>
                					<img src="<?php echo base_url();?>/assets/images/2-stars.jpg" style="width:500px;"/>
                					<?php
            					} else if ($star_value == '1') { ?>
                					<img src="<?php echo base_url();?>/assets/images/1-star.jpg" style="width:500px;"/>
                					<?php
            					}
            					?>

						</div>


					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>