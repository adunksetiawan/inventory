<?php
if ($_SESSION['level'] == "admin")
	{

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$cari			= $_REQUEST['tcari'];

$akun="SELECT * FROM account where true";
if($cari!="") {
	$akun.=" and nama like '$cari%'";	
}
$akun.=" order by nama asc";	
$sqlnav=$akun;
$akun.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-search"></i>Pencarian</h4>
											</div>
											<div class="box-body big">
												<form class="form-inline" role="form" method="post" action="index.php?halaman=data_akun">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Email address</label>
													<input name="tcari" type="text" class="form-control" id="exampleInputEmail2" placeholder="Cari..">
												  </div>
												  <button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                                                  <a href="index.php?halaman=form_akun" class="btn btn-danger">Tambah user</a>
												</form>
											</div>
										</div>
										<!-- /BASIC -->
									</div>
</div>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Data akun</h4>
												<div class="tools hidden-xs">
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
											<div class="box-body big">    

<table class="table table-hover">
<thead>
  <tr>
    <th id="namaField">Nama</th>
    <th id="namaField">level</th>
    <th colspan="3" align="center"><center>Aksi</center></th>
  </tr>
  </thead>
  <tbody>
  <?php
  	
	$qakun=mysql_query($akun);
  while($dakun=mysql_fetch_array($qakun))
  {
	  
	  echo "
  <tr bgcolor=$warna>
    <td>$dakun[nama]</td>
    <td>$dakun[level]</td>
    <td><a href=index.php?halaman=form_ubah_akun&id=$dakun[username]>";?>ubah<?php echo "</a>
	</td>
	<td>";
	?>
	<a href="<?php echo "proses.php?proses=hapus_akun&id=$dakun[username]"; ?>" 
		onclick="return confirm('Apakah Anda akan menghapus data akun ini ?')">hapus</a>
       
	<?php 
	echo "
    </td>
    <td><a href='?halaman=hak_akses&id=$dakun[username]'>Pengaturan akses</a> </td>
  </tr>";
  }
  ?>
  <tr>
                                              <td colspan="5" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=data_akun&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=data_akun.php");?>
                                              </td>
                                              </tr>
  </tbody>
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
		echo '<script type="text/javascript">alert("Anda tidak diizinkan mengakses halaman ini.");</script>';
        lompat_ke("index.php");
	}
?>