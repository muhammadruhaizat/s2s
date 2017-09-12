	<?php $this->load->view('header'); ?>
		<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['corechart']});

		  google.charts.setOnLoadCallback(drawChartRating);
		  google.charts.setOnLoadCallback(drawChartPerc);
		  google.charts.setOnLoadCallback(drawChartNegeri);
		  google.charts.setOnLoadCallback(drawChartPeringkat);

		  function drawChartRating() {

			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Penarafan');
			data.addColumn('number', 'Jumlah');
			data.addRows([
			  ['Ada', <?php echo $total_senarai_sekolah_rated->val;?>],
			  ['Tiada', <?php echo $total_senarai_sekolah_unrated;?>]
			]);

			var options = {'title':'Penarafan Sekolah (Maklumat)',
						   'width':800,
						   'height':600,
							is3D: true,
							sliceVisibilityThreshold: 0};

			var chart = new google.visualization.PieChart(document.getElementById('chart_rating'));
			chart.draw(data, options);
		  }

		  function drawChartPerc() {

			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Penarafan');
			data.addColumn('number', 'Jumlah');
			data.addRows([
			  ['1 Bintang', <?php echo $total_senarai_sekolah_1star->val;?>],
			  ['2 Bintang', <?php echo $total_senarai_sekolah_2star->val;?>],
			  ['3 Bintang', <?php echo $total_senarai_sekolah_3star->val;?>],
			  ['4 Bintang', <?php echo $total_senarai_sekolah_4star->val;?>],
			  ['5 Bintang', <?php echo $total_senarai_sekolah_5star->val;?>],
			  ['Tiada', <?php echo $total_senarai_sekolah_nostar->val;?>]
			]);

			var options = {'title':'Penarafan Sekolah (Bintang)',
						   'width':800,
						   'height':600,
							is3D: true,
							sliceVisibilityThreshold: 0};

			var chart = new google.visualization.ColumnChart(document.getElementById('chart_perc'));
			chart.draw(data, options);
		  }

		  function drawChartNegeri() {

			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Negeri');
			data.addColumn('number', 'Jumlah');
			data.addRows([
			  <?php foreach($total_senarai_sekolah_negeri as $eachNegeri):?>
				['<?php echo $eachNegeri->Negeri;?>', <?php echo $eachNegeri->val;?>],
			  <?php endforeach;?>
			]);

			var options = {'title':'Pecahan Sekolah Mengikut Negeri',
						   'width':800,
						   'height':600,
							is3D: true,
							sliceVisibilityThreshold: 0};

			var chart = new google.visualization.ColumnChart(document.getElementById('chart_negeri'));
			chart.draw(data, options);
		  }

		  function drawChartPeringkat() {

			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Peringkat Sekolah');
			data.addColumn('number', 'Jumlah');
			data.addRows([
			  <?php foreach($total_senarai_sekolah_peringkat as $eachPeringkat):?>
				['<?php echo $eachPeringkat->PeringkatSekolah;?>', <?php echo $eachPeringkat->val;?>],
			  <?php endforeach;?>
			]);

			var options = {'title':'Pecahan Sekolah Mengikut Peringkat Sekolah',
						   'width':800,
						   'height':600,
							is3D: true,
							sliceVisibilityThreshold: 0};

			var chart = new google.visualization.PieChart(document.getElementById('chart_peringkat'));
			chart.draw(data, options);
		  }
		</script>
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
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
						<div>
							<table>
								<tr>
									<td><div id="chart_rating"></div></td>
									<td><div id="chart_peringkat"></div></td>
								</tr>
								<tr>
									<td><div id="chart_negeri"></div></td>
									<td><div id="chart_perc"></div></td>
								</tr>
							</table>
						</div>
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div>
	<div id="dialog-overlay" style="position: fixed; left: 0; right: 0; bottom: 0; top: 0; background: rgba(0,0,0,0.5); z-index: 3000; text-align: center; display: none">
		<div id="dialog" style="width: 500px; background: #eee; padding: 10px; border-radius: 5px; box-shadow: 0 0 30px rgba(0,0,0,1); margin: 0 auto; margin-top: 200px; text-align: left;">
			<h3 class="title" style="margin: 5px 0; padding: 0"></h3>
			<br/>
			<p class="text" style="color: #555"></p>
			<hr style="border-bottom: 1px solid #fff; border-top: 1px solid #aaa;" />
			<div style="text-align: right">
			<button>OK</button>
			</div>
		</div>
	</div>