<?php

$self           = $_SERVER['PHP_SELF'];
$page           = $_REQUEST['module'];
$page           = $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow         = $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$tgl_awal           = $_REQUEST['tgl_awal'];
$tgl_akhir          = $_REQUEST['tgl_akhir'];

$pesan="SELECT * FROM jual";
$pesan.=" order by inc desc";    
$sqlnav=$pesan;
$pesan.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

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

	$warna1="#FEEBFD";
	$warna2="#FFFFFF";
	$warna=$warna1;
?>

<div class="row">
    <div class="col-lg-12">   
        <!-- BASIC -->

        <div class="box border red">
            <div class="box-title">
                <h4>Pencarian</h4>
            </div>

            <div class="box-body big">
                <form class="form-inline" role="form" method="post" action="index.php?halaman=jual_cari">
                    <div class="form-group" id="sandbox-container">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label> <input name="tgl_awal" type="text" class="form-control" id="datepicker" placeholder="Tanggal awal">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label> <input name="tgl_akhir" type="text" class="form-control" id="datepicker1" placeholder="Tanggal akhir">
                    </div>&nbsp;<button name="tampil" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                </form>
            </div>
        </div><!-- /BASIC -->
    </div>
</div>    
    
<div class="row">
    <div class="col-lg-12">
        <!-- BOX -->

        <div class="box border red">
            <div class="box-title">
                <h4><?=$halaman?></h4>

                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="box-body">
<table class="table table-hover table-bordered">
<thead>
  <tr>
    <th id="namaField">No.Trans</th>
    <th id="namaField">No.Nota</th>
    <th id="namaField">Tgl. Trans</th>
    <th id="namaField">Nama Distributor</th>
    <th id="namaField">Tanggal Jatuh Tempo</th>
  </tr>
  </thead>
  <?php 
  		
		$query=mysql_query($pesan);
		while($row=mysql_fetch_array($query)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		$piutang=$row['total']-$row['jml_bayar'];
		?>
        <tbody>
  <tr bgcolor=<?php echo $warna; ?>>
    <td><a href="#" onclick="javascript:wincal=window.open('jual_detail.php?id=<?php echo $row['jual_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['jual_id']; ?></a></td>
    <td><?php echo "$row[no_nota]"; ?></td>
    <td><?php echo "$row[tgl_jual]"; ?></td>
    <td><?php echo "$row[pelanggan_nama]"; ?></td>
    <td><?php echo "$row[tgl_jatuh_tempo]"; ?></td>
  </tr>
  <?php } ?>
  <tr>
                            <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=penjualan&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=penjualan.php");?></td>
                        </tr>
                        </tbody>
</table>
</div>
</div>
        </div><!-- /BOX -->
    </div>
</div>

