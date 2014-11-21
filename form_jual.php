<?php
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$a="SELECT * FROM jual";
$b="SELECT inc FROM jual ORDER BY inc DESC LIMIT 1";
$inc=penambahan($a, $b);

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

if (isset($_POST['run'])and($_POST['run']=="form2"))
{
	$cekQty="SELECT * FROM stok WHERE barang_id='$_POST[pilih_barang]'";
	$qcekQty=mysql_query($cekQty);
	$dcekQty=mysql_fetch_array($qcekQty);
	if (!empty($_POST['qty']))
	{
		//ambil dari stok
		$buah="SELECT * FROM stok WHERE barang_id='$_POST[pilih_barang]'";
		$qbuah=mysql_query($buah);
		$dbuah=mysql_fetch_array($qbuah);
		$sisa_qty=$dbuah['qty']-$_POST['qty'];
		if ($sisa_qty >= 0)
		{
			//insert ke temp_beli_detail
			$harga_total=$_POST['qty']*$dbuah['harga_barang'];
			$input="INSERT INTO temp_jual_detail(jual_id, barang_id, barang_nama, kategori, qty, packing, harga_barang, harga_total)
			VALUES('JL-$inc', '$dbuah[barang_id]', '$dbuah[barang_nama]', '$dbuah[kategori]', '$_POST[qty]', '$dbuah[packing]', 
			'$dbuah[harga_barang]', '$harga_total')";
			mysql_query($input);
			//update tabel stok
			$upstok="UPDATE stok SET qty='$sisa_qty' WHERE barang_id='$dbuah[barang_id]'";
			mysql_query($upstok);
		}
		else
		{
			echo "
			<script type=text/javascript>";
			echo "alert('Qty yang diambil melebihi stok')";
			echo "</script>";
		}
	}
}
?>
    
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-arrow-right"></i><?=$halaman?></h4>
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
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="proses.php">
            <input type="hidden" name="proses" id="proses" value="jual_insert" />
          <table border="0" cellspacing="1" cellpadding="0" class="table table-hover">
            <tr><input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
              <td id="noborder">No. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="jual_id" type="hidden" value="<?php echo "JL-$inc"; ?>" /><?php echo "JL-$inc"; ?></td>
            </tr>
            <tr>
              <td id="noborder">No. Nota</td>
              <td id="noborder">:</td>
              <td id="noborder">
                <input type="text" class="form-control" name="no_nota" id="input" value="<?php echo "nota-$inc"; ?>" />
              </td>
            </tr>
            <tr>
              <td id="noborder">Tgl. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder">
                <input type="text" class="form-control" name="tgl_jual" id="datepicker" value="<?php echo date(d)."/".date(m)."/".date(Y);?>" />
              </td><input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
            </tr>
            <tr>
              <td id="noborder">Pembeli</td>
              <td id="noborder">:</td>
              <td id="noborder"><select class="form-control" name="pelanggan_nama" id="input">
                <option>umum</option>
                <?php
                $pel="SELECT * FROM pelanggan ORDER BY inc ASC";
                $qpel=mysql_query($pel);
                while ($dtpel=mysql_fetch_array($qpel)){
              echo "
                <option>$dtpel[pelanggan_nama]</option>";
                }
                ?>
              </select></td>
            </tr>
          </table>
        
        <!--tabel item barang -->
        <h4>Barang yg dibeli :</h4>
        <table border="0" cellspacing="1" cellpadding="0" class="table table-hover">
          <thead>
          <tr>
            <th id="namaField">ID</th>
            <th id="namaField">Nama Barang</th>
            <th id="namaField">Kategori</th>
            <th id="namaField">Packing</th>
            <th id="namaField">Qty</th>
            <th id="namaField">Harga Barang</th>
            <th id="namaField">Harga Total</th>
            <th id="namaField">Menu</th>
          </tr>
          </thead>
          <?php
          $tmp="SELECT * FROM temp_jual_detail WHERE jual_id='JL-$inc'";
          $qtmp=mysql_query($tmp);
          while ($dtmp=mysql_fetch_array($qtmp))
          {
          echo "
          <tr>
            <td>$dtmp[barang_id]</td>
            <td>$dtmp[barang_nama]</td>
            <td>$dtmp[kategori]</td>
            <td>$dtmp[packing]</td>
            <td>$dtmp[qty]</td>
            <td align=right>".digit($dtmp['harga_barang'])."</td>
            <td align=right>".digit($dtmp['harga_total'])."</td>
            <td><a href=proses.php?proses=hapus_item_jual&id=$dtmp[barang_id]><div id=tombol>hapus</div></a></td>
          </tr>";
          }
          ?>
          <tr>
            <td id="namaField" style="color:#FFF; border:none; background-color:#333" align="right" colspan="5">&nbsp;</td>
            <td style="color:#FFF; border:none; background-color:#333" align="right">total:</td>
            <td style="color:#FFF; border:none; background-color:#333" align="right">
                <?php
                    $jml="SELECT SUM(harga_total) AS htotal FROM temp_jual_detail WHERE jual_id='JL-$inc'";
                    $qjml=mysql_query($jml);
                    $djml=mysql_fetch_array($qjml);
                    echo digit($djml['htotal']);
                ?>
            </td>
            <td id="namaField" style="color:#FFF; border:none; background-color:#333" align="right"><input name="total" type="hidden" value="<?php echo $djml['htotal'] ?>" /></td>
          </tr>
        </table>
        <!--tabel pembayaran-->
        <table border="0" cellspacing="1" cellpadding="0" class="table table-hover">
          <tr>
            <td id="noborder">Total Bayar</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" class="form-control" placeholder="Jumlah bayar" name="jml_bayar" id="input" class="validate[required]" />
            </label></td>
          </tr>
          <tr>
            <td id="noborder">Tgl jatuh tempo</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" class="form-control" placeholder="Tgl jatuh tempo" name="tgl_jatuh_tempo" id="datepicker1" />
            </label></td>
          </tr>
          <tr>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">
              <input type="submit" class="btn btn-success" name="simpan" id="tombol" value="simpan" />
              <input type="reset" class="btn btn-danger" name="batal" id="tombol" value="batal" />
            </td>
          </tr>
        </table>
      </form>
    </td>
    <td valign="top">
      	<form id="formID" name="form2" method="post" action="">
        <input name="run" type="hidden" value="form2" />
        <table border="0" cellspacing="1" cellpadding="0" class="table table-hover" width="100%">
          <tr>
            <td id="namaField">Pilih Barang</td>
            <td id="namaField">Jumlah</td>
            <td id="namaField">add</td>
          </tr>
          <tr>
            <td>
              <select name="pilih_barang" id="input" class="form-control">
              <?php
			  	$stok="SELECT * FROM barang ORDER BY barang_nama ASC";
				$qstok=mysql_query($stok);
				while($dstok=mysql_fetch_array($qstok))
				{
					echo "<option value='$dstok[inc]'>$dstok[barang_nama] ($dstok[satuan]x$dstok[kg]Kg)</option>";
				}
			  ?>
              </select>
            </td>
            <td>
              <input name="qty" type="text" class="form-control" id="input" class="validate[required]" size="5" />
            </td>
            <td>
              <input type="submit" class="btn btn-success" name="add" id="tombol" value="add" />
            </td>
          </tr>
        </table>
    	</form>
    </td>
  </tr>
</table>
</div>
								</div>
								<!-- /BOX -->
							</div>
</div>

