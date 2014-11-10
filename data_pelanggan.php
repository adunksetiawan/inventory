<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$cari			= $_REQUEST['tcari'];

$qtmpil_pel="select * from pelanggan where true";
if($cari!="") {
	$qtmpil_pel.=" and pelanggan_nama like '%$cari%'";	
}
$qtmpil_pel.=" order by inc asc";	
$sqlnav=$qtmpil_pel;
$qtmpil_pel.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

?>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-search"></i>Pencarian</h4>
											</div>
											<div class="box-body big">
												<form class="form-inline" role="form" method="post" action="index.php?halaman=data_pelanggan">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Email address</label>
													<input name="tcari" type="text" class="form-control" id="exampleInputEmail2" placeholder="Cari..">
												  </div>
												  <button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                                                  <a href="index.php?halaman=form_data_master&kode=pelanggan_insert" class="btn btn-danger">Input data pelanggan</a>
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
										<h4><i class="fa fa-users"></i>Data pelanggan</h4>
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
          <th>No.</th>
          <th>ID Pelanggan</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Kontak</th>
          <th colspan="3" align="center">Aksi
          </th>
        </tr>
        </thead>
        <tbody>
        <?php 
		$qp_pel=mysql_query($qtmpil_pel);
		
		$no=1;
		
		while($row3=mysql_fetch_array($qp_pel)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
        <tr bgcolor=<?php echo $warna; ?>>
          <td><?=$no++;?></td>
          <td><?php echo "$row3[pelanggan_id]"; ?></td>
          <td><?php echo "$row3[pelanggan_nama]"; ?></td>
          <td><?php echo "$row3[pelanggan_alamat]"; ?></td>
          <td><?php echo "$row3[pelanggan_email]"; ?></td>
          <td><?php echo "$row3[pelanggan_kontak]"; ?></td>
          <td><?php echo "<a href=index.php?halaman=form_ubah_data&kode=pelanggan_update&id=$row3[pelanggan_id]>"; ?>
          	  <div id="tombol">ubah</div>
			  <?php echo "</a>";?>
          </td>
          <td><?php echo "<a href=proses.php?proses=pelanggan_delete&id=$row3[pelanggan_id]>"; ?>
          	  <div id="tombol" onclick="return confirm('Apakah Anda akan menghapus data buah ini ?')">hapus</div>
			  <?php echo "</a>"; ?>
          </td>
        </tr>
       
        
        <?php } ?>
         <tr>
                                              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=data_pelanggan&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=data_pelanggan.php");?>
                                              </td>
                                              </tr>
                                              </tbody>
      </table>
      </div>
								</div>
								<!-- /BOX -->
							</div>
</div>
