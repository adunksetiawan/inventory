<style type="text/css">
/*td{
	border:none;
}

#input{
	height:20px;
	border:1px solid #c0d3e2;
}*/
</style>
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

	echo "
	<form id=formUbahData name=formUbahData method=post action=proses.php>
	<input type=hidden name=proses id=proses value=$_GET[kode] />";
	if($_GET['kode']=="barang_update"){
		$pesan="SELECT * FROM barang WHERE inc='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query); ?>
        
        <div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-briefcase"></i>Ubah data barang</h4>
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
												<form role="form" class="form-horizontal">
												  <table border="0" cellspacing="2" cellpadding="0" width="100%">
          <tr>
            <td>Kode Barang</td><input type="hidden" name="inc" id="inc" value=<?=$data['inc'];?> />
            <td>:&nbsp;</td>
            <td><label><input placeholder="Kode Barang" readonly name="Barang_Kode" value="<?=$data['barang_id'];?>" type="text" id="input" class="form-control" size="50" maxlength="70" /></label></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Nama Barang" name="nmBarang" type="text" id="input" value="<?=$data['barang_nama'];?>" class="form-control" size="50" maxlength="70" />
            </label></td>
          </tr>
		      <tr>
            <td>Kategori Barang</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Kategori Barang" name="kategori" type="text" id="input" value="<?=$data['barang_kategori']?>" class="form-control" size="50" maxlength="70" />
            </label></td>
          </tr>
           <tr>
            <td>Packing</td>
            <td>:&nbsp;</td>
            <td><label>
              <input name="satuan" type="text" id="input" class="form-control" value="<?=$data['satuan']?>" size="5" maxlength="10" />
            </label>&nbsp;&nbsp;x&nbsp;
              <label>
                <input name="kg" type="text" id="input" class="form-control" size="5" value="<?=$data['kg']?>" maxlength="10" />
              </label>&nbsp;Kg</td>
          </tr>
           <tr>
            <td>Harga Satuan</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Harga" name="harga_satuan" type="text" value="<?=$data['harga_satuan']?>" id="input" class="form-control" size="19" maxlength="70" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="simpan" id="tombol" value="Simpan" class="btn btn-success" />
            </label>
              <label>
                <input type="reset" class="btn btn-danger" name="BatalBar" id="tombol" value="Batal" />
              </label></td>
          </tr>
        </table>
												</form>
											</div>
										</div>
										<!-- /BASIC -->
									</div>
</div>
	<?php }	elseif($_GET['kode']=="supplier_update"){
		$pesan="SELECT * FROM supplier WHERE supplier_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	?>
     <div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Ubah data supplier</h4>
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
        <table border=0 cellspacing=2 cellpadding=0 width="100%">
          <tr>
            <td>Supplier ID<input type="hidden" name="supplier_id" id="supplier_id" value="<?=$data['supplier_id']?>" /></td>
            <td>:</td>
            <td><?=$data['supplier_id'];?></td>
          </tr>
          <tr>
            <td>Nama Supplier</td>
            <td>:</td>
            <td><label>
              <input name="nmSupplier" class="form-control" type="text" id="input" size="70" maxlength="70" value=<?=$data['supplier_nama'];?> />
            </label></td>
          </tr>
          <tr>
            <td>Alamat Supplier</td>
            <td>:</td>
            <td><label>
              <input name="alamatSup" class="form-control" type="text" id="input" size="70" maxlength="100" value="<?=$data['supplier_alamat'];?>" />
            </label></td>
          </tr>
          <tr>
            <td>Kota Supplier</td>
            <td>:</td>
            <td><label>
              <input name="kotaSup" class="form-control" type="text" id="input" size="70" maxlength="70" value="<?=$data['supplier_kota'];?>" />
            </label></td>
          </tr>
          <tr>
            <td>Email Supplier</td>
            <td>:</td>
            <td><label>
              <input name="emailSup" class="form-control" type="text" id="input" size="70" maxlength="70" value="<?=$data['supplier_email'];?>" />
            </label></td>
          </tr>
          <tr>
            <td>Kontak Supplier</td>
            <td>:</td>
            <td><label>
              <input name="kontakSup" class="form-control" type="text" id="input" size="70" value="<?=$data['supplier_kontak'];?>" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="SimpanSup" id="tombol" value="Simpan" class="btn btn-success" />
            </label>
              <label>
                <input type="reset" name="BatalSup" id="tombol" value="Batal" class="btn btn-danger" />
              </label></td>
          </tr>
        </table>
        </div>
										</div>
										<!-- /BASIC -->
									</div>
</div>
	<?php }else{  
	$pesan="SELECT * FROM pelanggan WHERE pelanggan_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	?> 
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-users"></i>Input data pelanggan</h4>
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
        <table border=0 cellspacing=2 cellpadding=0 width=100%>
          <tr>
            <td>Pelanggan ID<input type=hidden name=pelanggan_id id=pelanggan_id value=<?=$data[pelanggan_id]?> /></td>
            <td>:</td>
            <td><label><?=$data[pelanggan_id]?></label></td>
          </tr>
          <tr>
            <td>Nama Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name=nmPelanggan type=text id=input size=70 maxlength=70 class=form-control value=<?=$data[pelanggan_nama]?> />
            </label></td>
          </tr>
          <tr>
            <td>Alamat Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name=alamatPel type=text id=input size=70 maxlength=100 value=<?=$data[pelanggan_alamat]?> class=form-control />
            </label></td>
          </tr>
          <tr>
            <td>Kota Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name=kotaPel type=text id=input size=70 maxlength=70 value=<?=$data[pelanggan_kota]?> class=form-control />
            </label></td>
          </tr>
          <tr>
            <td>Email Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name=emailPel type=text id=input size=70 maxlength=70 value=<?=$data[pelanggan_email]?> class=form-control />
            </label></td>
          </tr>
          <tr>
            <td>Kontak Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name=kontakPel type=text id=input size=70 value=<?=$data[pelanggan_kontak]?> class=form-control />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type=submit name=SimpanPel id=tombol value=Simpan class="btn btn-success" />
            </label>
              <label>
                <input type=reset name=BatalPel id=tombol value=Batal class="btn btn-danger" />
              </label></td>
          </tr>
        </table>
        </div>
										</div>
										<!-- /BASIC -->
									</div>
</div>       
	<?php }
	echo "</form>";
?>