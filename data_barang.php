<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"15";

$cari			= $_REQUEST['tcari'];

$qtmpil_barang="select * from barang where true";
if($cari!="") {
	$qtmpil_barang.=" and barang_nama like '$cari%'";
}
$qtmpil_barang.=" order by inc asc";	
$sqlnav=$qtmpil_barang;
$qtmpil_barang.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

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
												<form class="form-inline" role="form" method="post" action="index.php?halaman=data_barang">
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
										<h4><i class="fa fa-briefcase"></i>Data barang</h4>
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
												<th>No</th>
												<th>Kode barang</th>
												<th>Nama barang</th>
												<th>Kategori</th>
                                                <th>Packing</th>
                                                <th>Harga satuan</th>                                          
                                                <?php if($_REQUEST['act']!="") {?>
                                                <th colspan="2" align="center"><center>Aksi</center></th>
											     <?php } ?>
                                              </tr>
											</thead>
											<tbody>
                                            <?php 
		
		$qp_brg=mysql_query($qtmpil_barang);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
											  <tr>
												<td><?php echo "$no"; ?></td>
          <td><?php echo "$row1[barang_id]"; ?></td>
          <td><?php echo "$row1[barang_nama]"; ?></td>
          <td><?php echo "$row1[barang_kategori]"; ?></td>
          <td><?php echo "$row1[satuan]x$row1[kg]Kg";?></td>
          <td><?php echo "$row1[harga_satuan]"; ?></td>
          <?php if($_REQUEST['act']!="") { ?>
          <td align="center"><?php 
          if($_REQUEST['act']=="ubah") {
            echo "<a class='btn btn-warning' href=index.php?halaman=form_ubah_data&kode=barang_update&id=$row1[inc]>"; ?><i class="fa fa-edit"></i>&nbsp;ubah<?php echo "</a>"; 
          } ?></td>
          <td align="center">
          <?php if($_REQUEST['act']=="hapus") { ?>
          <a class="btn btn-danger" href="<?php echo "proses.php?proses=barang_delete&id=$row1[inc]>"; ?>" onclick="return confirm('Apakah Anda akan menghapus data buah ini ?')"><i class="fa fa-trash-o"></i>&nbsp;hapus</a>
          <?php } ?>
          </td>
          <?php } ?>
											  </tr>
                                              <?php	$no++; } ?>
                                              <tr>
                                              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=data_barang&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=data_barang.php");?>
                                              </td>
                                              
                                              </tr>
											</tbody>
										  </table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
</div>


