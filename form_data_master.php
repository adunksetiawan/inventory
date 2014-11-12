<!--<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/demos/demos.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/ui-lightness/jquery.ui.all.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/template.css" type="text/css"/>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine-id.js" type="text/javascript" charset="utf-8"></script>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
    </script> 
    <script>
            jQuery(document).ready( function() {
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
    </script> 
<style type="text/css">
#formID
{
	border:none;
	margin:0px;
	padding:0px;
}
td
{
	padding:5px 9px;
	border:none;
}
#namaField{
	color:#FFF;
	background-color:#333;
	text-align:center;
	padding-top:7px;
	border:none;
}
body {
	color:#315567;
	background-color:#e9e9e9;
	font-size:11px;
	font-family:Verdana, Geneva, sans-serif;
}
</style>-->
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

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

	echo "
	<form id=formID name=formInput method=post action=proses.php>
	  <input type=hidden name=proses id=proses value=$_GET[kode] />";
//form data barang
	if ($_GET['kode']=="barang_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM barang";
		$b="SELECT inc FROM barang ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
	?>	
    
    <div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-briefcase"></i>Input data barang</h4>
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
            <td>Kode Barang</td><input type="hidden" name="inc" id="inc" value="<?=$inc;?>" />
            <td>:&nbsp;</td>
            <td><label><input placeholder="Kode Barang" name="Barang_Kode" type="text" id="input" class="form-control" size="50" maxlength="70" /></label></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Nama Barang" name="nmBarang" type="text" id="input" class="form-control" size="50" maxlength="70" />
            </label></td>
          </tr>
		      <tr>
            <td>Kategori Barang</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Kategori Barang" name="kategori" type="text" id="input" class="form-control" size="50" maxlength="70" />
            </label></td>
          </tr>
           <tr>
            <td>Packing</td>
            <td>:&nbsp;</td>
            <td><label>
              <input name="satuan" type="text" id="input" class="form-control" size="5" maxlength="10" />
            </label>&nbsp;&nbsp;x&nbsp;
              <label>
                <input name="kg" type="text" id="input" class="form-control" size="5" maxlength="10" />
              </label>&nbsp;Kg</td>
          </tr>
           <tr>
            <td>Harga Satuan</td>
            <td>:&nbsp;</td>
            <td><label>
              <input placeholder="Harga" name="harga_satuan" type="text" id="input" class="form-control" size="19" maxlength="70" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" class="btn btn-success" name="SimpanBar" id="tombol" value="Simpan" />
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
	<?php }
//form data supplier
	elseif($_GET['kode']=="supplier_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM supplier";
		$b="SELECT inc FROM supplier ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b); ?>
      
        <div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Input data supplier</h4>
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
            <td>Supplier ID <input type="hidden" name="supplier_inc" id="supplier_inc" value="<?=$inc?>" /></td>
            <td>:</td>
            <td><label><input name="supplier_id" type="text" readonly="readonly" id="input" class="form-control" size="70" maxlength="70" value="SPL-<?=$inc;?>" /></label></td>
          </tr>
          <tr>
            <td>Nama Supplier</td>
            <td>:</td>
            <td><label>
              <input name="nmSupplier" type="text" id="input" class="form-control" size="70" maxlength="70" placeholder="Nama Supplier" />
            </label></td>
          </tr>
          <tr>
            <td>Alamat Supplier</td>
            <td>:</td>
            <td><label>
              <input name="alamatSup" type="text" id="input" placeholder="Alamat Supplier" class="form-control" size="70" maxlength="100" />
            </label></td>
          </tr>
          <tr>
            <td>Kota Supplier</td>
            <td>:</td>
            <td><label>
              <input name="kotaSup" type="text" id="input" class="form-control" placeholder="Kota Supplier" size="70" maxlength="70" />
            </label></td>
          </tr>
          <tr>
            <td>Email Supplier</td>
            <td>:</td>
            <td><label>
              <input name="emailSup" type="text" id="input" class="form-control" placeholder="Email Supplier" size="70" maxlength="70" />
            </label></td>
          </tr>
          <tr>
            <td>Kontak Supplier</td>
            <td>:</td>
            <td><label>
              <input name="kontakSup" type="text" id="input" class="form-control" placeholder="Kontak Supplier" size="70" />
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
//form data pelanggan
	//pemanggilan fungsi penambahan
		$a="SELECT * FROM pelanggan";
		$b="SELECT inc FROM pelanggan ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
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
        <table border="0" cellspacing="2" cellpadding="0" width="100%">
          <tr>
            <td>Pelanggan ID <input type="hidden" name="pelanggan_inc" id="pelanggan_inc" value="<?php echo $inc;?>" /></td>
            <td>:</td>
            <td><label><input type="text" name="pelanggan_id" id="input" class="form-control" value="PLG-<?=$inc;?>" /></label></td>
          </tr>
          <tr>
            <td>Nama Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name="nmPelanggan" type="text" id="input" class="form-control" size="70" maxlength="70" placeholder="Nama pelanggan" />
            </label></td>
          </tr>
          <tr>
            <td>Alamat Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name="alamatPel" placeholder="Alamat pelanggan" type="text" id="input" class="form-control" size="70" maxlength="100" />
            </label></td>
          </tr>
          <tr>
            <td>Kota Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name="kotaPel" type="text" id="input" class="form-control" size="70" maxlength="70" placeholder="Kota pelanggan" />
            </label></td>
          </tr>
          <tr>
            <td>Email Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name="emailPel" type="text" id="input" class="form-control" size="70" maxlength="70" placeholder="Email pelanggan" />
            </label></td>
          </tr>
          <tr>
            <td>Kontak Pelanggan</td>
            <td>:</td>
            <td><label>
              <input name="kontakPel" type="text" id="input" class="form-control" size="70" placeholder="Kontak pelanggan" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="SimpanPel" id="tombol" value="Simpan" class="btn btn-success" />
            </label>
              <label>
                <input type="reset" name="BatalPel" id="tombol" value="Batal" class="btn btn-danger" />
              </label></td>
          </tr>
        </table>
      </div>
										</div>
										<!-- /BASIC -->
									</div>
</div>       
	<?php }
     echo " </form>";

?>