<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if (!isset($_POST['proses']) and ($_POST['proses']=="form1"))
	{
		$qtmpil_pel="select * from pelanggan order by inc asc";
	}
	elseif (isset($_POST['proses']) and ($_POST['tcari']==""))
	{
		$qtmpil_pel="select * from pelanggan order by inc asc";
	}
	else
	{
		$qtmpil_pel="SELECT * FROM pelanggan WHERE pelanggan_nama LIKE '%$_POST[tcari]%'";	
	}
?>

<div id="judulHalaman"><strong>Data Pelanggan</strong></div>
<form id="form1" name="form1" method="post" action="index.php?halaman=data_pelanggan">
<input name="proses" type="hidden" value="form1" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>Pencarian pelanggan</td>
  </tr>
  <tr>
    <td><input name="tcari" id="input" type="text" size="25" /><input name="bcari" id="tombol" type="submit" value="cari" /></td>
  </tr>
</table>
</form>
<?php
	$warna1="#FEEBFD";
	$warna2="#FFFFFF";
	$warna=$warna1;
?> 
      <table cellspacing="1" cellpadding="0">
        <tr>
          <td id="namaField">Nama</td>
          <td id="namaField">Alamat</td>
          <td id="namaField">Email</td>
          <td id="namaField">Kontak</td>
          <td colspan="2" id="namaField">
          <?php echo "<a href=index.php?halaman=form_data_master&kode=pelanggan_insert>"; ?>
            <div id="tombol">tambah data</div>
          <?php echo "</a>"; ?>  
          </td>
        </tr>
        <?php 
		$qp_pel=mysql_query($qtmpil_pel);
		
		while($row3=mysql_fetch_array($qp_pel)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
        <tr bgcolor=<?php echo $warna; ?>>
          <td><?php echo "$row3[pelanggan_nama]"; ?></td>
          <td><?php echo "$row3[pelanggan_alamat]"; ?></td>
          <td><?php echo "$row3[pelanggan_email]"; ?></td>
          <td><?php echo "$row3[pelanggan_kontak]"; ?></td>
          <td><?php echo "<a href=index.php?halaman=form_ubah_data&kode=pelanggan_update&id=$row3[pelanggan_id]>"; ?>
          	  <div id="tombol">ubah</div>
			  <?php echo "</a>";?>
          </td>
          <td><?php echo "<a href=proses.php?proses=pelanggan_delete&id=$row3[pelanggan_id]>"; ?>
          	  <div id="tombol" onclick="return confirm('Apakah Anda akan menghapus data buah ini ?')">hapus</div>
			  <?php echo "</a>"; ?>
          </td>
        </tr>
        <?php } ?>
      </table>
