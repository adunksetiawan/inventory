<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$a="SELECT * FROM beli";
$b="SELECT inc FROM beli ORDER BY inc DESC LIMIT 1";
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

if (isset($_POST['proses'])and($_POST['proses']=="form2"))
{
	if (!empty($_POST['qty']))
	{
		$buah="SELECT * FROM barang WHERE inc='$_POST[pilih_barang]'";
		$qbuah=mysql_query($buah);
		$dbuah=mysql_fetch_array($qbuah);
		//insert ke temp_beli_detail
		$harga_total=$dbuah['satuan']*$dbuah['kg']*$dbuah['harga_satuan'];
		$input="INSERT INTO temp_beli_detail(beli_id, barang_id, barang_nama, kategori, qty, packing, harga_satuan, harga_total)
		VALUES('BM-$inc', '$dbuah[inc]', '$dbuah[barang_nama]', '$dbuah[barang_kategori]', '$_POST[qty]', '$dbuah[satuan]x$dbuah[kg]kg', '$dbuah[harga_satuan]', '$harga_total')";
		mysql_query($input);
	}
}
?>
<div id="page"> 
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-arrow-left"></i><?=$halaman?></h4>
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
        <input name="proses" type="hidden" value="beli_insert" />
        <input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
			<table class="table table-hover">
  				<tr>
    				<td id="noborder">No. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><?php echo "BM-$inc" ?><input name="beli_id" type="hidden" value="<?php echo "BM-$inc"; ?>" /></td>
  				</tr>
  				<tr>
    				<td id="noborder">No. Faktur</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><input class="form-control" name="no_fak" type="text" id="input" value="<?php echo "FAK-$inc" ?>" /></td>
  				</tr>
  				<tr>
    				<td id="noborder">Tgl. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><input class="form-control" name="tgl_trans" type="text" id="datepicker" value="<?php echo date(d)."/".date(m)."/".date(Y);?>" /></td>
  				</tr>
  				<tr>
    				<td id="noborder">Supplier</td>
    				<td id="noborder">:</td>
    				<td id="noborder">
    				<select name="pilih_supplier" id="input" class="form-control">
                    <?php
						$supplier="SELECT * FROM supplier ORDER BY supplier_nama ASC";
						$qsupplier=mysql_query($supplier);
						while($dsupplier=mysql_fetch_array($qsupplier))
						{
							echo "<option>$dsupplier[supplier_nama]</option>";
						}
					?>
    				</select>
    				</td>
  				</tr>
  				<tr>
    				<td id="noborder">Ongkos Truk</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><input class="form-control" name="ongkos" type="text" id="input" /></td>
  				</tr>
			</table>
            
            <table class="table table-hover">
              <tr>
                <td id="noborder" colspan="8">Barang yang dibeli :</td>
              </tr>
              <tr>
                <th id="namaField">ID</th>
                <th id="namaField">Nama Barang</th>
                <th id="namaField">Kategori</th>
                <th id="namaField">Qty</th>
                <th id="namaField">Packing</th>
                <th id="namaField">Harga Satuan</th>
                <th id="namaField">Harga Total</th>
                <th>
				<?php echo "<a href=?halaman=proses&proses=hapus_item_beli&status=all&id=BM-$inc><div id=tombol>Hapus Semua</div></a>"; ?>
                </th>
              </tr>
              <?php
			  	$rinci="SELECT * FROM temp_beli_detail WHERE beli_id='BM-$inc'";
				$qrinci=mysql_query($rinci);
				while($drinci=mysql_fetch_array($qrinci))
				{
			  ?>
              <tr>
                <td><?php echo $drinci['barang_id']; ?></td>
                <td><?php echo $drinci['barang_nama']; ?></td>
                <td><?php echo $drinci['kategori']; ?></td>
                <td><?php echo $drinci['qty']; ?></td>
                <td><?php echo $drinci['packing']; ?></td>
                <td align="right"><?php echo digit($drinci['harga_satuan']); ?></td>
                <td align="right"><?php echo digit($drinci['harga_total']); ?></td>
               <td><?php echo "<a href=?halaman=proses&proses=hapus_item_beli&status=satu&id=$drinci[barang_id]><div id=tombol>hapus</div></a>"; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td style="color:#FFF; background-color:#333; border:none" colspan="6" align="right">total :</td>
                <td style="color:#FFF; background-color:#333; border:none" align="right">
					<?php
						$sum="SELECT SUM(harga_total)AS total FROM temp_beli_detail WHERE beli_id='BM-$inc'";
						$qsum=mysql_query($sum);
						$dsum=mysql_fetch_array($qsum);
						echo digit($dsum['total']);
					?>
                </td>
                <td style="color:#FFF; background-color:#333; border:none">&nbsp;</td>
              </tr>
            </table>

            <table border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td><input class="btn btn-success" type="submit" name="simpan" id="tombol" value="simpan" />&nbsp;</td>
				<td><input class="btn btn-danger" type="reset" name="batal" id="tombol" value="batal" /></td>
              </tr>
            </table>

		</form>
	</td>
    <td valign="top">
    	<form id="formID"  name="form2" method="post" action="?halaman=form_beli">
        <input name="proses" type="hidden" value="form2" />
        <table class="table table-hover">
  			<tr>
    			<td>Nama Barang</td>
    			<td>Jumlah</td>
    			<td>Menu</td>
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
                <input type="text" class="form-control" name="qty" id="input" class="validate[required]" size="3" />
  			  	</td>
   				 <td><label>
   				  <input type="submit" class="btn btn-success" name="add" id="tombol" value="add" />
			    </label></td>
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
		</div>
    </div>
    </div>  
  </div>
</div>
