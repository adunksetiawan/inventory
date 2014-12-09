<?php
if ($_SESSION['level'] == "admin")
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
td
{
	padding:5px 9px;
	border:none;
}
</style>
</head>

<body>
<?php
	$menu="SELECT * FROM menus WHERE id='$_GET[id]'";
	$qmenu=mysql_query($menu);
	$dmenu=mysql_fetch_array($qmenu);
?>
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-align-justify"></i>Ubah menu</h4>
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
<input name="proses" type="hidden" value="ubah_menu" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>ID Menu</td>
    <td>:</td>
    <td><label>
    <input name="id" type="hidden" value="<?php echo $dmenu['id']; ?>" />
      <input class="form-control" placeholder="ID Menu" readonly type="text" name="id_menu" id="input" value="<?php echo      $dmenu['id_menu']?>" />
    </label></td>
  </tr>
  <tr>
    <td>ID Menu Tree</td>
    <td>:</td>
    <td><label>
      <input type="text" name="id_menu_tree" readonly id="input" class="form-control" placeholder="ID Menu Tree" value="<?php echo      $dmenu['id_menu_tree']?>" />
    </label></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><label>
      <input type="text" name="nm_menu" id="input" class="form-control" placeholder="Nama Menu" value="<?php echo      $dmenu['nm_menu']?>" />
    </label></td>
  </tr>
  <tr>
    <td>Url</td>
    <td>:</td>
    <td><label>
      <input type="text" name="url" id="input" class="form-control" placeholder="URL" style="width: 280px;" value="<?php echo      $dmenu['url']?>" />
    </label></td>
  </tr>
  <tr>
    <td>Custom class</td>
    <td>:</td>
    <td><label>
      <input type="text" name="custom_class" id="input" class="form-control" placeholder="Custom class" value="<?php echo      $dmenu['custom_class']?>" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="simpan" id="tombol" value="simpan" class="btn btn-success" />
      <input type="reset" name="batal" id="tombol" value="batal"  class="btn btn-danger"/>
    </td>
  </tr>
</table>
</form>
</div>
										</div>
										<!-- /BASIC -->
									</div>
</div>    
<p>&nbsp;</p>
</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>