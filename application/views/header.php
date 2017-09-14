<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/roshack_eye.gif">
			<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <title>Safe 2 School</title>
  </head>
  <body>
  
		<div id="navbar" class="navbar navbar-default ace-save-state" style="background:repeat-x #6c9842!important;">
			<div class="navbar-container ace-save-state" id="navbar-container">

				<div class="navbar-header pull-left">
				  <table width="106" border="0" align="center">
				    <tr>
				      <td width="96"><a href="<?php echo base_url();?>" class="navbar-brand"><img src="<?php echo base_url();?>/assets/images/roshack.gif" style="width:150px;" align="absmiddle"/></a></td>
			        </tr>
			      </table>
				</div>

				<div class="navbar-buttons navbar-header pull-left" style="height:96px;">
				  <table width=100% border="0" align="center" style="height:100%;">
				    <tr>
				      <td align="left" valign="middle">
				        <ul class="nav ace-nav">
				        <li class="purple"><a href="<?php echo base_url();?>dashboard"><br/><i class="ace-icon fa fa-home" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Utama</span> </a> </li>
				        <li class="purple"><a href="<?php echo base_url();?>main"><br/><i class="ace-icon fa fa-globe" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Peta</span> </a> </li>
				        <!--<li class="lightblue"> <a href="<?php echo base_url();?>schoolist"><br/><i class="ace-icon fa fa-tasks" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Senarai</span> </a> </li>-->
				        <li class="red"> <a href="<?php echo base_url();?>datainput"><br/><i class="ace-icon fa fa-exchange" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Input Data</span> </a> </li>
				        <!--<li class="lightblue"> <a href="<?php echo base_url();?>analysis"><br/><i class="ace-icon fa fa-bar-chart" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Analisa</span> </a> </li>-->
				        <li class="red"> <a href="<?php echo base_url();?>carian"><br/><i class="ace-icon fa fa-search" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Carian</span> </a> </li>
				        <li class="red"> <a href="<?php echo base_url();?>carianbas"><br/><i class="ace-icon fa fa-bus" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Carian Bas</span> </a> </li>
				        <li class="purple"> <a href="<?php echo base_url();?>feedback"><br/><i class="ace-icon fa fa-comments" style="font-size:2.5em !important;"></i><br/><span class="badge badge-grey">Maklum Balas</span> </a></li>
				        </ul></td>
			        </tr>
			      </table>
			    </div>
			</div><!-- /.navbar-container -->
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			
			<div class="main-content">