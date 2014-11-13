<?php 

$pch1		= explode("/", $_POST['tgl_awal']);
$pch2		= explode("/", $_POST['tgl_akhir']);
$tgl_awal		= $pch1[1]."/".$pch1[0]."/".$pch1[2];
$tgl_akhir		= $pch2[1]."/".$pch2[0]."/".$pch2[2];

?>
							<div class="col-lg-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-arrow-right"></i>Pengeluaran barang dari tgl <?=$tgl_awal?> s/d <?=$tgl_akhir?></h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">    
<table class="table table-bordered table-hover">
<thead>
  <tr>
    <th id="namaField">No.Trans</th>
    <th id="namaField">No.Nota</th>
    <th id="namaField">Tgl. Trans</th>
    <th id="namaField">Nama Pembeli</th>
    <th id="namaField">Total Harga</th>
    <th id="namaField">Jumlah Bayar</th>
    <th id="namaField">Piutang</th>
    <th id="namaField">Tanggal Jatuh Tempo</th>
  </tr>
  </thead>
  <?php 
  		$total_piutang=0;
  		$pesan="SELECT * FROM jual WHERE tgl_jual BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY jual_id DESC";
		$sum_jml_bayar="SELECT SUM(jml_bayar) AS total_jml_bayar FROM jual WHERE tgl_jual BETWEEN '$tgl_awal' 
		AND '$tgl_akhir' ORDER BY jual_id DESC";
		$query=mysql_query($pesan);
		
		while($row=mysql_fetch_array($query)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		$piutang=$row['total']-$row['jml_bayar'];
		$total_piutang=$total_piutang+$piutang;
		?>
  <tr bgcolor=<?php echo $warna; ?>>
    <td><a href="#" onclick="javascript:wincal=window.open('jual_detail.php?id=<?php echo $row['jual_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['jual_id']; ?></a></td>
    <td><?php echo "$row[no_nota]"; ?></td>
    <td><?php echo "$row[tgl_jual]"; ?></td>
    <td><?php echo "$row[pelanggan_nama]"; ?></td>    
    <td align="right"><?php echo digit($row['total']); ?></td>
    <td align="right"><?php echo digit($row['jml_bayar']); ?></td>
    <td align="right"><?php echo digit($piutang); ?></td>
    <td><?php echo "$row[tgl_jatuh_tempo]"; ?></td>
  </tr>
  <?php } 

	$sum2="SELECT SUM(total) AS ttotal FROM jual WHERE tgl_jual BETWEEN '$tgl_awal' 
		  AND '$tgl_akhir' ORDER BY jual_id DESC";
	$qsum2=mysql_query($sum2);
	$dsum2=mysql_fetch_array($qsum2);
  ?>
  <tr>
    <td colspan="4" align="right" style="color:#FFF; border:none; background-color:#333">Total =</td>
    <td align="right" style="color:#FFF; border:none; background-color:#333"><?php echo "Rp ". digit($dsum2['ttotal']); ?></td>
    <td align="right" style="color:#FFF; border:none; background-color:#333">
	<?php $qsum_jml_bayar=mysql_query($sum_jml_bayar);
		  $dsum_jml_bayar=mysql_fetch_array($qsum_jml_bayar);
		  echo "Rp ". digit($dsum_jml_bayar['total_jml_bayar']); 
	?></td>
    <td align="right" style="color:#FFF; border:none; background-color:#333"><?php echo "Rp ". digit($total_piutang); ?></td>
    <td align="right" style="color:#FFF; border:none; background-color:#333"></td>
  </tr>
</table>
</div>
								</div>
								<!-- /BOX -->
							</div>
</div>
