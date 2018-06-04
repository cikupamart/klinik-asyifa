<?php
foreach ($pasien as $p) {
	?>
		<div style="border-radius: 50px 50px 50px 50px;border-style: solid;height: 25%; padding: 55px 0px 15px 0px; width: 30%;background-color:#7affa2;">
			<div style="border-style: solid;border-radius: 1px 1px 1px 1px;background-color: #fffd93">
				<center>Kartu Pasien</center>
			</div>
			<p align="center">No RM : <?echo $p->no_rm?></p>
			<table>
				<tr>
					<td>Nama</td><td>:&nbsp;</td><td><? echo $p->nama_pasien; ?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td><td>:&nbsp;</td><td><? echo $p->tanggal_lahir; ?></td>
				</tr>
			</table>
		</div>
<?	
}
?>