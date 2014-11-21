
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"15";

$cari			= $_REQUEST['tcari'];

$sql="SELECT * FROM barang where true";	
$sumQty="SELECT SUM(qty) AS totalQty FROM stok where true";

                            if($_REQUEST['kode']!="") { 
                                $kode=$_REQUEST['kode'];
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&kode=".$kode;
                            } else if(($_REQUEST['kode']!="")&&($_REQUEST['id']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            } else if($_REQUEST['act']!="") {
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&act=".$_REQUEST['act'];
                            } else {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            }
                            
                            //echo $gethal;
                            
                            if($_REQUEST['halaman']!="") {
                            
                            $qrya="select id_menu, id_menu_tree from menus where url like '$gethal%'";
                            $ck=mysql_query($qrya);
                            $dtck=mysql_fetch_array($ck);
                            //echo "<br>".$dtck['id_menu'];
                            
                            cek_hak_akses($dtck['id_menu'], $dtck['id_menu_tree'], $_SESSION['username']);
                            }

if($cari!="") {
	$sql.=" and barang_nama LIKE '%$cari%'";
	$sumQty.=" and barang_nama LIKE '%$cari%'";
}
$sql.=" order by inc asc";
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
										<table class="table table-hover table-bordered">
                                        <thead>
  <tr>
  	<th id="namaField">No</th>
    <th id="namaField">ID Barang</th>
    <th id="namaField">Nama Barang</th>
    <th id="namaField">Kategori</th>
    <th id="namaField">Qty</th>
    <th id="namaField">Packing</th>
    <th id="namaField">Harga Barang</th>
    <?php if($_REQUEST['act']!="") { ?>
    <th id="namaField" colspan="2">Menu</th>
    <?php } ?>
  </tr>
  </thead>
  <tbody>
    <?php
		$no=1;
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{

        $sqls="SELECT * FROM stok where barang_id='".$data['inc']."'";
        $qrys=mysql_query($sqls);
        $dtstok=mysql_fetch_array($qrys);
        
	echo "
  <tr bgcolor=$warna>
  	<td>$no</td>
    <td>$data[barang_id]</td>
    <td>$data[barang_nama]</td>
    <td>$data[barang_kategori]</td>
    <td>";
     
    if($dtstok['qty']=="") {
        echo "-";
    } else {
        echo $dtstok['qty'];
    }
    
    echo "</td>
	<td>$data[satuan]x$data[kg]kg</td>
	<td>";
    
    if($dtstok['harga_barang']=="") {
        echo "0";
    } else {
        echo $dtstok['harga_barang'];
    }
    
    echo "</td>"; ?>
	<?php if($_REQUEST['act']!="") { ?>
    <?php if($_REQUEST['act']=="ubah") {?>
    <td colspan="2">
		<a class="btn btn-warning" href="<?php echo "index.php?halaman=form_ubah_stok&id=$data[barang_id]";?>"><div id="tombol"><i class="fa fa-edit"></i>&nbsp;ubah</div></a>
	</td>
    <?php } else if($_REQUEST['act']=="hapus") { ?>
    <td colspan="2">
		<a class="btn btn-danger" href="<?php echo "proses.php?proses=hapus_stok&id=$data[barang_id]"; ?>" 
		onclick="return confirm('Apakah Anda akan menghapus data stok ini ?')"><div id="tombol"><i class="fa fa-trash-o"></i>&nbsp;hapus</div></a>
	</td>
	<?php
    }
    }
    echo "</tr>";
	$no++;
	} ?>
   <tr>
   <?php 
   if($_REQUEST['act']!="") {
        $rowspan='colspan="8"';
   } else {
        $rowspan='colspan="6"';
   }
   ?>
  	<td style="background-color:#333;color:#FFF;border:none" <?=$rowspan?> align="right">total :</td>
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
