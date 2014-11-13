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
	$akun="SELECT * FROM account WHERE username='".$_SESSION['username']."'";
	$qakun=mysql_query($akun);
	$dakun=mysql_fetch_array($qakun);
?>
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Profil user</h4>
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
<form id="form1" name="form1" method="post" action="proses_ubah_password.php">
<input name="proses" type="hidden" value="ubah_akun" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td><input name="username" type="hidden" value="<?php echo $dakun['username']; ?>"/>
    </td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><label>
      <input type="text" class="form-control" placeholder="Nama" name="nama" id="input" value="<?php echo $dakun['nama']; ?>" />
    </label></td>
  </tr>
  <tr>
  <td colspan="3"><div class="alert alert-block alert-info fade in">
											<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
												<p></p><h4><i class="fa fa-lock"></i>&nbsp;Ubah Password</h4>Silahkan masukkan password lama anda untuk verifikasi pergantian ke password yang baru.<p></p>
										</div></td>
  </tr>
  <tr>
    <td>Password Lama </td>
    <td>:</td>
    <td><label>
      <input type="password" class="form-control" placeholder="Password lama" style="width: 300px;" name="paslama" id="input" />
    </label></td>
  </tr>
  <tr>
    <td>Password Baru </td>
    <td>:</td>
    <td><label>
      <input type="password" class="form-control" placeholder="Password baru" style="width: 300px;" name="pasbaru" id="input" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="simpan" id="tombol" value="simpan" class="btn btn-success" />
      <input type="reset" name="batal" id="tombol" value="batal" class="btn btn-danger" onclick="javascript:location.href='index.php'" />
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