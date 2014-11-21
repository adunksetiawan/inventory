
<?php
	$warna1="#FEEBFD";
	$warna2="#FFFFFF";
	$warna=$warna1;
?>
<?php echo "<a href=form_jual.php>"; ?>
<div id="tombolAdd">tambah data</div>
<?php echo "</a>"; ?>
    <form id="form1" name="form1" method="post" action="index.php?halaman=jual_cari">
    <input name="proses" type="hidden" value="form1" />
      <table border="0">
        <tr>
          <td>tanggal awal</td>
          
          <td>tanggal akhir</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input name="tgl_awal" type="text" id="datepicker" /></td>
          <td><input name="tgl_akhir" type="text" id="datepicker1" /></td>
          <td><input name="tampil" id="tombol" type="submit" value="tampilkan" /></td>
        </tr>
      </table>
    </form> 
<table cellpadding="0" cellspacing="1">
  <tr>
    <td id="namaField">No.Trans</td>
    <td id="namaField">No.Nota</td>
    <td id="namaField">Tgl. Trans</td>
    <td id="namaField">Nama Pembeli</td>
    <td id="namaField">Total Harga</td>
    <td id="namaField">Jumlah Bayar</td>
    <td id="namaField">Piutang</td>
    <td id="namaField">Tanggal Jatuh Tempo</td>
  </tr>
  <?php 
  		$pesan="SELECT * FROM jual ORDER BY inc DESC LIMIT 25";
		$query=mysql_query($pesan);
		while($row=mysql_fetch_array($query)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		$piutang=$row['total']-$row['jml_bayar'];
		?>
  <tr bgcolor=<?php echo $warna; ?>>
    <td><a href="#" onclick="javascript:wincal=window.open('jual_detail.php?id=<?php echo $row['jual_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['jual_id']; ?></a></td>
    <td><?php echo "$row[no_nota]"; ?></td>
    <td><?php echo "$row[tgl_jual]"; ?></td>
    <td><?php echo "$row[pelanggan_nama]"; ?></td>
    <td align="right"><?php echo "Rp "; echo digit($row['total']); ?></td>
    <td align="right"><?php echo "Rp "; echo digit($row['jml_bayar']); ?></td>
    <td align="right"><?php echo "Rp "; echo digit($piutang); ?></td>
    <td><?php echo "$row[tgl_jatuh_tempo]"; ?></td>
  </tr>
  <?php } ?>
</table>
