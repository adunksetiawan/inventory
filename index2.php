<!-- DASHBOARD CONTENT -->
						<!--<div class="row">
							<div class="col-md-6">
		<?php

		/*$kat=mysql_query("select * from barang_kategori");
		while($dtkat=mysql_fetch_array($kat)) {

			echo $chart="SELECT * FROM  `distributor_jual` as a, distributor_jual_detail as b WHERE a.jual_id=b.jual_id and kategori='$dtkat[nm_kat]'";
			$query_pria=mysql_query($chart);

			// kita itung jumlah baris yang ada dari hasil query diatas
			$totalPria   = mysql_num_rows($query_pria);
		
		}*/
		?>
		<script class="code" type="text/javascript">
		$(document).ready(function(){
			// kita masukkan jumlah total ditas kemari
		    plot1 = $.jqplot('pie', [[['WANITA',<?php echo $totalPria; ?>],['PRIA', <?php echo $totalPria; ?>],['WARIA',<?php echo $totalPria; ?>]]], {
		        gridPadding: {top:0, bottom:38, left:0, right:0},
		      seriesDefaults:{renderer:$.jqplot.PieRenderer, trendline:{show:false}, rendererOptions: { padding: 20, showDataLabels: true}},
		                  legend:{
		                      show:true, 
		                      placement: 'outside', 
		                      rendererOptions: {
		                          numberRows: 1
		                      }, 
		                      location:'s',
		                      marginTop: '15px'
		                  }       
		    });
		});
		</script>
		<div id="pie" style="margin-top:20px; margin-left:20px; width:400px; height:400px;"></div>
							</div>
						</div>-->

<?php 

$id_dist=cek_user($_SESSION['username']);

$qryss="select pelanggan_nama from pelanggan where inc='$id_dist'";
$ck=mysql_fetch_array(mysql_query($qryss));
$pelnama=$ck['pelanggan_nama'];

?>
						
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-6">
								<div class="row">
								<?php 
									$dt=mysql_query("select * from barang_kategori");
									$jml=mysql_num_rows($dt);
									while($brg=mysql_fetch_array($dt)) {
									
									if($jml>=3) {
										$row="5";
									} else {
										$row="4";
									}

									$qrys="select sum(qty) as jumlah from distributor_jual_detail as b, distributor_jual as a where a.jual_id=b.jual_id and kategori='$brg[nm_kat]'";
									if($pelnama!="") {
										$qrys.=" and distributor_nama='$pelnama'";
									}
									$dtjual=mysql_query($qrys);
									$hsl=mysql_fetch_array($dtjual);
								?>
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-archive fa-3x"></i>
												<span style="color:#000;">
												
										   		</span>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php if($hsl['jumlah']<1) { echo "0"; } else { echo $hsl['jumlah']; } ?></div>
												<div class="title"><?php echo $brg['nm_kat']; ?></div>
												<?php if($hsl['jumlah']<1) { echo ""; } else { ?>
												<span class="label label-success">
													Terjual <i class="fa fa-arrow-up"></i>
												</span>
												<?php } ?>
										   </div>
										</div>
									 </div>
								  </div>
								<?php } ?>
								</div>
									
								<div class="row">
									<div class="col-md-12">
										<div class="quick-pie panel panel-default">
											<div class="panel-body">
												<div class="col-md-4 text-center">
													<div id="dash_pie_1" class="piechart" data-percent="59">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">New Visitors <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_2" class="piechart" data-percent="73">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Bounce Rate <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_3" class="piechart" data-percent="90">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Brand Popularity <i class="fa fa-angle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
							   </div>
							</div>
							<!-- /COLUMN 1 -->
							
							<!-- COLUMN 2 -->
							<div class="col-md-6">
								<!--<div class="box solid grey">
									<div class="box-title">
										<h4><i class="fa fa-dollar"></i>Revenue</h4>
										<div class="tools">
											<span class="label label-danger">
												20% <i class="fa fa-arrow-up"></i>
											</span>
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
									<div class="box-body">
										<div id="chart-revenue" style="height:240px"></div>
									</div>
								</div>-->
									<div class="box border orange">
									<div class="box-title">
										<h4><i class="fa fa-archive"></i>Stok Produk</h4>
										<div class="tools">
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
									<div class="box-body">
										<table class="table table-hover">
											<thead>
											  <tr>
												<th>#</th>
												<th>Nama Barang</th>
												<th>Packing</th>
												<th>Qty sisa</th>
											  </tr>
											</thead>
											<tbody>
											<?php 
											//echo $pelnama; 
											$dt=mysql_query("select * from barang_kategori");
											$jml=mysql_num_rows($dt);

											$no=1;
											while($brg=mysql_fetch_array($dt)) {

											$dtss="select barang_nama, packing, sum(qty) as totalqty from jual as a, jual_detail as b where a.jual_id=b.jual_id and kategori='$brg[nm_kat]' ";
											if($pelnama!="") {
												$dtss.=" and pelanggan_nama='$pelnama'";
											}
											$dtss.=" group by barang_nama";
											
											$rsdt=mysql_query($dtss);
											$dtn=mysql_fetch_array($rsdt);
											?>
											  <tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $dtn['barang_nama']; ?></td>
												<td><?php echo $dtn['packing']; ?></td>
												<td><?php echo $dtn['totalqty']; ?></td>
											  </tr>
											<?php } ?>
											</tbody>
										  </table>
									</div>
									</div>
							</div>
							<!-- /COLUMN 2 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Traffic & Sales</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
											<ul class="nav nav-tabs">
												 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Traffic Statistics</span></a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
													<!-- TAB 1 -->
													<div id="chart-dash" class="chart"></div>
													<hr class="margin-bottom-0">
												   <!-- /TAB 1 -->
												 </div>
												 <div class="tab-pane fade" id="box_tab2">
													<div class="row">
														<div class="col-md-8">
															<div class="demo-container">
																<div id="placeholder" class="demo-placeholder"></div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="demo-container" style="height:100px;">
																<div id="overview" class="demo-placeholder"></div>
															</div>
															<div class="well well-bottom">
																<h4>Month over Month Analysis</h4>
																<ol>
																	<li>Selection support makes it easy to construct flexible zooming schemes.</li>
																	<li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
																	<li>Try selecting a rectangle on either of them.</li>
																</ol>
															</div>
														</div>
													</div>
												</div>
											 </div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /HERO GRAPH -->