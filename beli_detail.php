<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Invoice</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="css/responsive.css" >
	<!-- PRINT -->
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print"/>
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
	$warna1="#c0d3e2";
	$warna2="#cfdde7";
	$warna=$warna1;

	$beli="SELECT * FROM beli WHERE beli_id='$_GET[id]' order by inc asc";
	$qbeli=mysql_query($beli);
	$data=mysql_fetch_array($qbeli);
		

?>

<!-- INVOICE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box">
									<div class="box-body">
										<div class="panel panel-default">
										  <div class="panel-body">
											
											<div class='row'>
												<div class='col-lg-12 payment-info'>
												  <div class='invoice-title text-muted'>Detail Pembelian</div>
												  <div class="well">
													  <strong>No. Transaksi: </strong> <?php echo "$data[beli_id]"; ?>
													  <br>
													  <strong>No. Faktur: </strong> <?php echo "$data[no_fak]"; ?>
													  <br>
													  <strong>Tanggal Transaksi: </strong> <?php echo "$data[tgl_trans]"; ?>
													  <br>
													  <strong>Supplier: </strong> <?php echo "$data[supplier_nama]"; ?>
													  <br>
													  <strong>Biaya Pengiriman: </strong> <?php echo "Rp "; echo digit($data['biaya_kirim']); ?>
												  </div>
												</div>
											  </div>
										  </div>
										  <!-- COST TABLE -->
										  <table class="table table-striped table-hover font-400 font-14">
											<thead>
											  <tr>
												<th id="namaField">Barang ID</th>
                                                <th id="namaField">Nama Buah</th>
                                                <th id="namaField">Kategori</th>
                                                <th id="namaField">Qty</th>
                                                <th id="namaField">Packing</th>
                                                <th id="namaField">Harga satuan</th>
                                                <th id="namaField">Harga total</th>
											  </tr>
											</thead>
                                            
											<tbody>
                                            <?php 
		$pesan="SELECT * FROM beli_detail WHERE beli_id='$_GET[id]'";
		$query=mysql_query($pesan);
		
		while($row=mysql_fetch_array($query)){
		?>
											  <tr>
												<td align="center"><?php echo "$row[barang_id]"; ?></td>
        <td align="left"><?php echo "$row[barang_nama]"; ?></td>
        <td align="center"><?php echo "$row[kategori]"; ?></td>
        <td align="center"><?php echo "$row[qty]"; ?></td>
        <td align="center"><?php echo "$row[packing]"; ?></td>
        <td align="center"><?php echo digit($row['harga_satuan']);?></td>
        <td align="center"><?php echo digit($row['harga_total']); ?></td>
											  </tr>
				  							<?php } ?>
                                              <tr>
                                              <tr>
        <td style="color:#FFF; background-color:#333; border:none" colspan="3" align="right">total Qty :</td>
        <td style="color:#FFF; background-color:#333; border:none">
        	<?php
				$sumQty="SELECT SUM(qty) AS totalQty FROM beli_detail WHERE beli_id='$_GET[id]'";
				$qsumQty=mysql_query($sumQty);
				$dsumQty=mysql_fetch_array($qsumQty);
				echo $dsumQty['totalQty'];
			?>
        </td>
        <td style="color:#FFF; background-color:#333; border:none">&nbsp;</td>
        <td style="color:#FFF; background-color:#333; border:none" align="right">Total =</td>
        <td style="color:#FFF; background-color:#333; border:none" align="right"><?php echo "Rp. "; echo digit($data['total']); ?></td>
      </tr>
                                              </tr>
											</tbody>
										  </table>
										  <!-- /COST TABLE -->
										  <!-- FOOTER -->
										  <hr>
										  <div class="panel-body">
											  <div class='row'>
												<div class='col-sm-12'>
												  <div class='text-right font-400 font-14'>
													<h2 class="amount">Total keseluruhan: <?php $alltotal=$data['total']+$data['biaya_kirim'];
	echo "Rp. ";
	echo digit($alltotal); ?></h2>
												  <div class='btn-group hidden-xs pull-right invoice-btn-group'>
													  <a class="btn btn-lg btn-default" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
												  </div>
												  <div class='btn-group visible-xs pull-right invoice-btn-group'>
													  <a class="btn btn-default" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
												  </div>
												  </div>
												  
												</div>
											  </div>
										  </div>
										  <!-- /FOOTER -->
										  <hr>
										  <div class="divide-100"></div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /INVOICE -->



<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("widgets_box");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>