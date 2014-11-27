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

	$jual="SELECT * FROM distributor_jual WHERE jual_id='$_GET[id]' order by inc asc";
	$qjual=mysql_query($jual);
	$data=mysql_fetch_array($qjual);
		

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
												  <div class='invoice-title text-muted'>Detail Pengeluaran Barang</div>
												  <div class="well">
													  <strong>No. Transaksi: </strong> <?php echo "$data[jual_id]"; ?>
													  <br>
													  <strong>No. Nota: </strong> <?php echo "$data[no_nota]"; ?>
													  <br>
													  <strong>Tanggal Transaksi: </strong> <?php echo "$data[tgl_jual]"; ?>
													  <br>
													  <strong>Pelanggan: </strong> <?php echo "$data[pelanggan_nama]"; ?>
													  <br>
													  <strong>Distributor Penjual: </strong> <?php echo "$data[distributor_nama]"; ?>
													  <br>
													  <strong>Tgl. Jatuh tempo: </strong> <?php echo "$data[tgl_jatuh_tempo]"; ?>
												  </div>
												</div>
											  </div>
										  </div>
										  <!-- COST TABLE -->
										  <table class="table table-striped table-hover table-bordered font-400 font-14">
											<thead>
											  <tr>
												<th id="namaField">Barang ID</th>
                                            <th id="namaField">Nama Buah</th>
        <th id="namaField">Kategori</th>
        <th id="namaField">Qty</th>
        <th id="namaField">Packing</th>
       
											  </tr>
											</thead>
                                            
											<tbody>
                                            <?php 
		$pesan="SELECT * FROM distributor_jual_detail WHERE jual_id='$_GET[id]'";
		$query=mysql_query($pesan);
		
		while($row=mysql_fetch_array($query)){
		?>
											  <tr>
												<td align="center"><?php echo "$row[barang_id]"; ?></td>
        <td><?php echo "$row[barang_nama]"; ?></td>
        <td><?php echo "$row[kategori]"; ?></td>
        <td><?php echo "$row[qty]"; ?></td>
        <td><?php echo "$row[packing]"; ?></td>
        
											  </tr>
				  							<?php } ?>
                                              <tr>
                                              </tr>
                                              <tr>
        <td colspan="3" style="color:#FFF; background-color:#333; border:none;" align="right">Total Qty :</td>
        
        <td style="color:#FFF; background-color:#333; border:none;">
        	<?php
				$sumQty="SELECT SUM(qty) AS totalQty FROM distributor_jual_detail WHERE jual_id='$_GET[id]'";
				$qsumQty=mysql_query($sumQty);
				$dsumQty=mysql_fetch_array($qsumQty);
				echo $dsumQty['totalQty'];
			?>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="color:#FFF; background-color:#333; border:none;" align="right">Total Qty :</td>
        
        <td style="color:#FFF; background-color:#333; border:none;">
        	<?php
				$sumQty="SELECT SUM(qty) AS totalQty FROM jual_detail WHERE jual_id='$_GET[id]'";
				$qsumQty=mysql_query($sumQty);
				$dsumQty=mysql_fetch_array($qsumQty);
				echo $dsumQty['totalQty'];
			?>
        </td>
        <td style="color:#FFF; background-color:#333; border:none;">&nbsp;</td>
        <td style="color:#FFF; background-color:#333; border:none;" align="right">Total =</td>
        <td style="color:#FFF; background-color:#333; border:none;" align="right">
        	<?php
				$jual="SELECT * FROM distributor_jual WHERE jual_id='$_GET[id]'";
				$qjual=mysql_query($jual);
				$djual=mysql_fetch_array($qjual);
				echo "Rp ".digit($djual['total']);
			?>
        </td>
      </tr>
      <tr>
      	<td colspan="6" style="color:#FFF; background-color:#333; border:none;" align="right">Bayar =</td>
        <td style="color:#FFF; background-color:#333; border:none;" align="right"><?php echo "Rp ".digit($djual['jml_bayar']); ?></td>
      </tr>
      <tr>
      	<td colspan="6" style="color:#FFF; background-color:#333; border:none;" align="right">Piutang =</td>
        <td style="color:#FFF; background-color:#333; border:none;" align="right">
		<?php  
		$piutang=$djual['total']-$djual['jml_bayar'];
		echo "Rp ".digit($piutang);
		?>
        </td>
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
													
												  <div class='btn-group hidden-xs pull-right invoice-btn-group'>
													  <a class="btn btn-lg btn-default" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
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