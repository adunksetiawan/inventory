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

<script type="text/javascript">
  $(document).ready(function() {

    var level2 = $("#level").val();
    if(level2=="distributor") {
      $(".distributornya").show();
    } else {
      $(".distributornya").hide();      
    }


      $("#level").change(function() {
          var level = $(this).val();
          if(level=="distributor") {
              $(".distributornya").show();
          } else {
              $(".distributornya").hide();
          }
      });
  });
</script>
</head>

<body>
<?php
	$akun="SELECT * FROM account WHERE username='$_GET[id]'";
	$qakun=mysql_query($akun);
	$dakun=mysql_fetch_array($qakun);
?>
<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-user"></i>Ubah user</h4>
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
<input name="proses" type="hidden" value="ubah_akun" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>Username</td>
    <td>:</td>
    <td><input name="username" type="hidden" value="<?php echo $dakun['username']; ?>" />
      <input type="text" class="form-control" placeholder="Username" disabled="disabled" name="user" id="input" value="<?php echo $dakun['username']; ?>" />
    </td>
  </tr>
  <tr>
    <td>password</td>
    <td>:</td>
    <td><label>
      <input type="text" class="form-control" placeholder="Password" disabled="disabled" name="password" id="input" value="<?php echo $dakun['password']; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>nama</td>
    <td>:</td>
    <td><label>
      <input type="text" class="form-control" placeholder="Nama" name="nama" id="input" value="<?php echo $dakun['nama']; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>level</td>
    <td>:</td>
    <td><label>
      <select name="level" id="level" class="form-control">
        <option value="<?php echo $dakun['level']; ?>" <?php if($dakun['level']=="admin") { echo "selected"; } else { echo ""; } ?>>admin</option>
        <option value="<?php echo $dakun['level']; ?>" <?php if($dakun['level']=="user") { echo "selected"; } else { echo ""; } ?>>user</option>
        <option value="<?php echo $dakun['level']; ?>" <?php if($dakun['level']=="distributor") { echo "selected"; } else { echo ""; } ?>>distributor</option>
      </select>
    </label></td>
  </tr>
  <tr class="distributornya" style="display:none;">
    <td>Distributor</td>
    <td>:</td>
    <td><label>
      <select name="distributor" id="distributor" class="form-control">
      <option value="0">Pilih distributor</option>
        <?php 
        $dist=mysql_query("select * from pelanggan");
        while($distributor=mysql_fetch_array($dist)) {
        ?>
        <option value="<?php echo $distributor['inc']?>" <?php if($distributor['inc']==$dakun['id_distributor']) { echo "selected"; } else { echo ""; } ?>><?php echo $distributor['pelanggan_nama']?></option>
        <?php } ?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="simpan" id="tombol" value="simpan" class="btn btn-success" />
      <input type="reset" name="batal" id="tombol" value="batal" class="btn btn-danger" />
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