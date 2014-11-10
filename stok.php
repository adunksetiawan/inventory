
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$cari			= $_REQUEST['tcari'];

$sql="SELECT * FROM stok where true";	
$sumQty="SELECT SUM(qty) AS totalQty FROM stok where true";

if($cari!="") {
	$sql.=" and barang_nama LIKE '%$cari%'";
	$sumQty.=" and barang_nama LIKE '%$cari%'";
}
$sql.=" order by barang_id asc";
$sumQty.=" order by barang_id asc";	
$sqlnav=$sql;
$sql.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

?>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-search"></i>Pencarian</h4>
											</div>
											<div class="box-body big">
												<form class="form-inline" role="form"  method="post" action="index.php?halaman=stok">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Email address</label>
													<input name="tcari" type="text" class="form-control" id="exampleInputEmail2" placeholder="Cari..">
												  </div>
												  <button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
												</form>
											</div>
										</div>
										<!-- /BASIC -->
									</div>
</div>

<div class="row">
							<div class="col-lg-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-archive"></i>Data stok</h4>
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
										<table class="table table-hover">
                                        <thead>
  <tr>
  	<th id="namaField">No</th>
    <th id="namaField">ID Barang</th>
    <th id="namaField">Nama Barang</th>
    <th id="namaField">Kategori</th>
    <th id="namaField">Qty</th>
    <th id="namaField">Packing</th>
    <th id="namaField">Harga Barang</th>
    <th id="namaField" colspan="2">Menu</th>
  </tr>
  </thead>
  <tbody>
    <?php
		$no=1;
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
	echo "
  <tr bgcolor=$warna>
  	<td>$no</td>
    <td>$data[barang_id]</td>
    <td>$data[barang_nama]</td>
    <td>$data[kategori]</td>
    <td>$data[qty]</td>
	<td>$data[packing]</td>
	<td>$data[harga_barang]</td>
	<td>";
	if ($_SESSION['level'] == "admin")
	{ ?>
		<a href="<?php echo "index.php?halaman=form_ubah_stok&id=$data[barang_id]";?>"><div id="tombol">ubah</div></a>
	</td>
    <td>
		<a href="<?php echo "proses.php?proses=hapus_stok&id=$data[barang_id]"; ?>" 
		onclick="return confirm('Apakah Anda akan menghapus data stok ini ?')"><div id="tombol">hapus</div></a>
	</td>
	<?php
    }
    echo "</tr>";
	$no++;
	} ?>
   <tr>
  	<td style="background-color:#333;color:#FFF;border:none" colspan="8" align="right">total :</td>
    <td id="namaField" style="background-color:#999;color:#FFF;border:none">
    	<?php
			$qsumQty=mysql_query($sumQty);
			$dsumQty=mysql_fetch_array($qsumQty);
			echo $dsumQty['totalQty'];
		?>
    </td>
  </tr>
  <tr>
                                              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=stok&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=stok.php");?>
                                              </td>
                                              </tr>
  </tbody>
</table>
</div>
								</div>
								<!-- /BOX -->
							</div>
</div>
