<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$cari			= $_REQUEST['tcari'];

$qtmpil_sup="select * from supplier where true";
if($cari!="") {
	$qtmpil_sup.=" and supplier_nama like '%$cari%' or supplier_kota like '$cari%'";	
}
$qtmpil_sup.=" order by inc asc";	
$sqlnav=$qtmpil_sup;
$qtmpil_sup.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

?>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-search"></i>Pencarian</h4>
											</div>
											<div class="box-body big">
												<form class="form-inline" role="form" method="post" action="index.php?halaman=data_supplier">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Email address</label>
													<input name="tcari" type="text" class="form-control" id="exampleInputEmail2" placeholder="Cari..">
												  </div>
												  <button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                                                  <a href="index.php?halaman=form_data_master&kode=supplier_insert" class="btn btn-danger">Input data supplier</a>
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
										<h4><i class="fa fa-user"></i>Data supplier</h4>
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
                                              	<th>ID Supplier</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Email</th>
												<th>Kontak</th>                                        
                                                <th colspan="2" align="center"><center>Aksi</center></th>
											  </tr>
											</thead>
											<tbody>
                                            <?php 
		$qp_sup=mysql_query($qtmpil_sup);
		
		$no=1;
		
		while($row2=mysql_fetch_array($qp_sup)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
											  <tr>
                                              <td><?=$no++;?></td>
                                              <td><?php echo "$row2[supplier_id]"; ?></td>
												<td><?php echo "$row2[supplier_nama]"; ?></td>
          <td><?php echo "$row2[supplier_alamat]"; ?></td>
          <td><?php echo "$row2[supplier_email]"; ?></td>
          <td><?php echo "$row2[supplier_kontak]"; ?></td>
          <td><?php echo "<a href=index.php?halaman=form_ubah_data&kode=supplier_update&id=$row2[supplier_id]>"; ?>
          		<div id="tombol">ubah</div>
			  <?php echo "</a>"; ?>
          </td>
          <td><?php echo "<a href=proses.php?proses=supplier_delete&id=$row2[supplier_id]>"; ?>
          		<div id="tombol" onclick="return confirm('Apakah Anda akan menghapus data buah ini ?')">hapus</div>
			  <?php echo "</a>"; ?>
          </td>
											  </tr>
                                              <?php	$no++; } ?>
                                              <tr>
                                              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=data_supplier&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=data_supplier.php");?>
                                              </td>
                                              </tr>
											</tbody>
										  </table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
</div>
