<table>
	<tr>
		<td>Penarafan</td>
		<td style="padding-left: 10px"><?php if($InfoSekolah->ACount > 0):?><span><?php if($InfoSekolah->star_rate == 1): echo "<img style='width:70px;' src='".base_url()."assets/images/1-star.png'/>"; elseif($InfoSekolah->star_rate == 2): echo "<img style='width:70px;' src='".base_url()."assets/images/2-star.png'/>";elseif($InfoSekolah->star_rate == 3): echo "<img style='width:70px;' src='".base_url()."assets/images/3-star.png'/>";elseif($InfoSekolah->star_rate == 4): echo "<img style='width:70px;' src='".base_url()."assets/images/4-star.png'/>";elseif($InfoSekolah->star_rate == 5): echo "<img style='width:70px;' src='".base_url()."assets/images/5-star.png'/>";endif;?></span> (<?php echo $InfoSekolah->star_rate;?>/5)<?php else:?><strong>Tiada penarafan buat masa ini</strong><?php endif;?></td>
	</tr>
	<tr>
		<td>Kod Sekolah</td>
		<td style="padding-left: 10px"><strong><?php echo $InfoSekolah->KodSekolah; ?></strong></td>
	</tr>
	<tr>
		<td>Nama Sekolah</td>
		<td style="padding-left: 10px"><strong><?php echo $InfoSekolah->NamaSekolah; ?></strong>
	</tr>
	<tr>
		<td>Daerah</td>
		<td style="padding-left: 10px"><strong><?php echo $InfoSekolah->BandarSurat; ?></strong>
	</tr>
	<tr>
		<td>Negeri</td>
		<td style="padding-left: 10px"><strong><?php echo $InfoSekolah->Negeri; ?></strong>
	</tr>
</table>

