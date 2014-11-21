
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if (!isset($_POST['proses']) and ($_POST['proses']=="form1"))
	{
		$sql="SELECT * FROM stok ORDER BY barang_id ASC";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok";
	}
	elseif (isset($_POST['proses']) and ($_POST['barang_nama']==""))
	{
		$sql="SELECT * FROM stok ORDER BY barang_id ASC";
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok";
	}
	else
	{
		$sql="SELECT * FROM stok WHERE barang_nama LIKE '%$_POST[barang_nama]%'";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok WHERE barang_nama LIKE '%$_POST[barang_nama]%'";
	}

	$warna1="#FEEBFD";
	$warna2="#FFFFFF";
	$warna=$warna1;
?>

<div id="judulHalaman"><strong>Data Stok</strong></div>
<form id="form1" name="form1" method="post" action="index.php?halaman=stok">
<input name="proses" type="hidden" value="form1" />
<table cellpadding="0" cellspacing="1">
  <tr>
    <td>Pencarian barang</td>
  </tr>
  <tr>
    <td><input name="barang_nama" id="input" type="text" /><input name="cari" id="tombol" type="submit" value="cari" /></td>
  </tr>
</table>
</form>
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
  	<td id="namaField">No</td>
    <td id="namaField">ID Barang</td>
    <td id="namaField">Nama Barang</td>
    <td id="namaField">Kategori</td>
    <td id="namaField">Qty</td>
    <td id="namaField">Satuan</td>
    <td id="namaField" colspan="2">Menu</td>
  </tr>
    <?php
		$no=1;
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
	echo "
  <tr bgcolor=$warna>
  	<td>$no</td>
    <td>$data[barang_id]</td>
    <td>$data[barang_nama]</td>
    <td>$data[kategori]</td>
    <td>$data[qty]</td>
	<td>$data[satuan]</td>
	<td>";
	if ($_SESSION['level'] == "admin")
	{ ?>
		<a href="<?php echo "index.php?halaman=form_ubah_stok&id=$data[barang_id]";?>"><div id="tombol">ubah</div></a>
	</td>
    <td>
		<a href="<?php echo "proses.php?proses=hapus_stok&id=$data[barang_id]"; ?>" 
		onclick="return confirm('Apakah Anda akan menghapus data stok ini ?')"><div id="tombol">hapus</div></a>
	</td>
	<?php
    }
    echo "</tr>";
	$no++;
	} ?>
   <tr>
  	<td style="background-color:#333;color:#FFF;border:none" colspan="4" align="right">total :</td>
    <td id="namaField">
    	<?php
			$qsumQty=mysql_query($sumQty);
			$dsumQty=mysql_fetch_array($qsumQty);
			echo $dsumQty['totalQty'];
		?>
    </td>
    <td id="namaField" colspan="3">&nbsp;</td>
  </tr>
</table>
