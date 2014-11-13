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
                                                  <!--<a href="index.php?halaman=form_data_master&kode=pelanggan_insert" class="btn btn-danger">Input data pelanggan</a>-->
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
      <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>ID Pelanggan</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Kontak</th>
          <?php if($_REQUEST['act']!="") {?>
          <th colspan="3"><center>Aksi</center>
          </th>
            <?php } ?>
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
          <?php if($_REQUEST['act']!="") { ?>
          <?php if($_REQUEST['act']=="ubah") { ?>
          <td align="center"><?php echo "<a class='btn btn-warning' href=index.php?halaman=form_ubah_data&kode=pelanggan_update&id=$row3[pelanggan_id]>"; ?>
          	  <i class="fa fa-edit"></i>&nbsp;ubah
			  <?php echo "</a>";?>
          </td>
          <?php } else if($_REQUEST['act']=="hapus") { ?>
          <td align="center"><?php echo "<a class='btn btn-danger' href=proses.php?proses=pelanggan_delete&id=$row3[pelanggan_id]>"; ?>
          	  <div id="tombol" onclick="return confirm('Apakah Anda akan menghapus data buah ini ?')"><i class="fa fa-trash-o"></i>&nbsp;hapus</div>
			  <?php echo "</a>"; ?>
          </td>
          <?php } } ?>
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
