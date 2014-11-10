<?php
	if ($_SESSION['level'] == "admin")
	{
		
$pch1		= explode("/", $_POST['tgl_awal']);
$pch2		= explode("/", $_POST['tgl_akhir']);
$tgl_awal		= $pch1[1]."/".$pch1[0]."/".$pch1[2];
$tgl_akhir		= $pch2[1]."/".$pch2[0]."/".$pch2[2];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
    <?php echo "<a href='index.php?halaman=barang_masuk' class='btn btn-danger'>"; ?>kembali<?php echo "</a><br><br>"; ?>
    
    <div class="row">
							<div class="col-lg-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-arrow-left"></i>Barang masuk dari tgl <?=$tgl_awal?> s/d <?=$tgl_akhir?></h4>
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
<table class="table table-bordered">
<thead>
  <tr>
    <th id="namaField">No.Trans</th>
    <th id="namaField">No.Fak</th>
    <th id="namaField">Tgl. Trans</th>
    <th id="namaField">Nama Supplier</th>
    <th id="namaField">Biaya kirim/Ongkos truk</th>
    <th id="namaField">Total Harga</th>
  </tr>
  </thead>
  <tbody>
  <?php 
  		$pesan="SELECT * FROM beli WHERE tgl_trans BETWEEN '$tgl_awal' AND '$tgl_akhir'";
		$query=mysql_query($pesan);
		
		while($row=mysql_fetch_array($query)){

		?>
  <tr>
    <td><a href="#" onclick="javascript:wincal=window.open('beli_detail.php?id=<?php echo $row['beli_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['beli_id']; ?></a></td>
    <td><?php echo "$row[no_fak]"; ?></td>
    <td><?php echo "$row[tgl_trans]"; ?></td>
    <td><?php echo "$row[supplier_nama]"; ?></td>
    <td><?php echo digit($row['biaya_kirim']); ?></td>
    <td><?php echo digit($row['total']); ?></td>
  </tr>
  </tbody>
  <?php } 
  	$sum1="SELECT SUM(biaya_kirim) AS total_ongkos FROM beli WHERE tgl_trans BETWEEN '$tgl_awal' AND '$tgl_akhir'";
	$qsum1=mysql_query($sum1);
	$dsum1=mysql_fetch_array($qsum1);
	$sum2="SELECT SUM(total) AS total_harga FROM beli WHERE tgl_trans BETWEEN '$tgl_awal' AND '$tgl_akhir'";
	$qsum2=mysql_query($sum2);
	$dsum2=mysql_fetch_array($qsum2);
  ?>
  <tr>
    <td style="color:#FFF; background-color:#333; border:none;" colspan="4" align="right" id="tabel_judul">Total :</td>
    <td style="color:#FFF; background-color:#333; border:none;" align="right"><?php echo "Rp ".digit($dsum1['total_ongkos']); ?></td>
    <td style="color:#FFF; background-color:#333; border:none;" align="right"><?php echo "Rp ".digit($dsum2['total_harga']); ?></td>
  </tr>
</table>
</div>
								</div>
								<!-- /BOX -->
							</div>
</div>
</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>