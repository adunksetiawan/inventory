<?php
if ($_SESSION['level'] == "admin")
	{
$sql="SELECT * FROM stok WHERE barang_id='$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
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
												<h4><i class="fa fa-archive"></i>Ubah data stok</h4>
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
<form id="form1" name="form1" method="post" action="proses.php">
<input name="proses" type="hidden" value="ubah_stok" />
  <table border="0" cellpadding="0" cellspacing="1" width="100%">
    <tr>
      <td>ID Barang</td>
      <td>:</td>
      <td><input name="barang_id" type="hidden" value="<?php echo $data['barang_id']; ?>" /><?php echo $data['barang_id']; ?></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td>:</td>
      <td><label><?php echo $data['barang_nama']; ?></label></td>
    </tr>
    <tr>
      <td>Kategori</td>
      <td>:</td>
      <td><label><?php echo $data['kategori']; ?></label></td>
    </tr>
    <tr>
      <td>Qty</td>
      <td>:</td>
      <td><label>
        <input name="qty" class="form-control" type="text" id="input" size="9" value="<?php echo $data['qty']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Satuan</td>
      <td>:</td>
      <td><label><?php if($data['satuan']!="") { echo $data['satuan']; } else { echo "Kg"; }?></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="simpan" id="tombol" class="btn btn-success" value="simpan" />
      </label></td>
    </tr>
  </table>
</form>
</div>
										</div>
										<!-- /BASIC -->
									</div>
</div>       
</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>