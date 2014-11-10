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
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Tambah user</h4>
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
<input name="proses" type="hidden" value="akun_insert" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>Username</td>
    <td>:</td>
    <td><label>
      <input class="form-control" placeholder="Username" type="text" name="username" id="input" />
    </label></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><label>
      <input type="text" name="password" id="input" class="form-control" placeholder="Password" />
    </label></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><label>
      <input type="text" name="nama" id="input" class="form-control" placeholder="Nama" />
    </label></td>
  </tr>
  <tr>
    <td>Level</td>
    <td>:</td>
    <td><label>
      <select name="level" id="input" class="form-control">
        <option>admin</option>
        <option>user</option>
      </select>
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