<?php error_reporting(0);?>
							<?php 
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";


function function_menu($menunya) {
    $id_menu=$menunya;
    return $id_menu;
}

function cek_hak_akses($id_menu, $id_menu_tree, $sesi) {
    $qck="select id_menu, id_menu_tree from account_menu where username='$sesi' and id_menu='$id_menu' and id_menu_tree='$id_menu_tree'";
    $rck=mysql_query($qck);
    $rck=mysql_num_rows($rck);
    
    if(($rck=="")||($rck<1)) {
        echo '<script type="text/javascript">alert("Anda tidak diizinkan mengakses halaman ini.");</script>';
        lompat_ke("index.php");
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Schoko Inventory | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="css/responsive.css" >
    <link rel="stylesheet" type="text/css"  href="css/datepicker.css" >
    <link rel="stylesheet" type="text/css"  href="css/datepicker3.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="css/animatecss/animate.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="js/jquery-todo/css/styles.css" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="js/fullcalendar/fullcalendar.min.css" />
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="js/gritter/css/jquery.gritter.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <script src="JQuery-UI-1.8.17.custom/development-bundle/jquery-1.7.1.js"></script>
    <link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/ui-lightness/jquery.ui.all.css">
    <script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
    <script src="JQuery-UI-1.8.17.custom/development-bundle/ui/i18n/jquery.ui.datepicker-id.js"></script>
    
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	</script>
    
    <script>
        $(document).ready(function() {
            $("#navs").change(function() {
                var url = $(this).val();
                window.location.href = url; 
                $("#sidebar").hide();
            });
        });
    </script>
    
</head>
<body>
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.php">
						<img src="img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<!--<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>-->
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<!--<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>-->
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-cog"></i>
							<span class="name">Skins</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu skins">
							<li class="dropdown-title">
								<span><i class="fa fa-leaf"></i> Theme Skins</span>
							</li>
							<li><a href="#" data-skin="default">Subtle (default)</a></li>
							<li><a href="#" data-skin="night">Night</a></li>
							<li><a href="#" data-skin="earth">Earth</a></li>
							<li><a href="#" data-skin="utopia">Utopia</a></li>
							<li><a href="#" data-skin="nature">Nature</a></li>
							<li><a href="#" data-skin="graphite">Graphite</a></li>
						 </ul>
					</li>-->
                    <?php 
                        $mn="select * from account_menu as a, menus as b where a.id_menu=b.id_menu and a.id_menu_tree=b.id_menu_tree and 
                        a.username='".$_SESSION['username']."' order by b.id_menu asc";
                        $rsm=mysql_query($mn);
                        
                        
                        while($menus=mysql_fetch_array($rsm)) {
                        
                        if($menus['id_menu_tree']==1) {    
                        $menunya=$menus['id_menu'];
                        function_menu($menunya);
                        
                        //$ckbaris=mysql_query("select id_menu_tree from menus where id_menu='".$menus['id_menu']."'");
                        //$baris=mysql_num_rows($ckbaris);
                        
                        ?>
							<li class="dropdown">
								<a href="<?=$menus['url']?>" class="dropdown-toggle" <?php if($baris>1) { ?> data-toggle="dropdown" <?php } ?>>
								<span class="menu-text"><?=$menus['nm_menu']?></span>
								<span class="selected"></span>
                                <?php if($baris>1) { ?>	
                                <i class="fa fa-angle-down"></i>
                                <?php } ?>
								</a>
                                <?php if($baris>1) { ?>	
                                <ul class="dropdown-menu skins">
							         <li><a href="#" data-skin="default">Subtle (default)</a></li>
							         <li><a href="#" data-skin="night">Night</a></li>
							         <li><a href="#" data-skin="earth">Earth</a></li>
							         <li><a href="#" data-skin="utopia">Utopia</a></li>
							         <li><a href="#" data-skin="nature">Nature</a></li>
							         <li><a href="#" data-skin="graphite">Graphite</a></li>
		                        </ul>
                                <?php } ?>    				
							</li>
                    <?php } else { echo ""; } } ?>
				</ul>
                
                <select id="navs" class="form-control">
                    <option value="" selected="selected">Pilih Menu</option>
                <?php 
                        $mn="select * from account_menu as a, menus as b where a.id_menu=b.id_menu and a.id_menu_tree=b.id_menu_tree and 
                        a.username='".$_SESSION['username']."' order by b.id_menu asc, b.id_menu_tree asc";
                        $rsm=mysql_query($mn);
                        
                        
                        while($menus=mysql_fetch_array($rsm)) {
                        
                        $menunya=$menus['id_menu'];
                        function_menu($menunya);
                        
                        
                            if($_REQUEST['kode']!="") { 
                                $kode=$_REQUEST['kode'];
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&kode=".$kode;
                            } else if(($_REQUEST['kode']!="")&&($_REQUEST['id']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            } else if(($_REQUEST['halaman']!="")&&($_REQUEST['act']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&act=".$_REQUEST['act'];
                            } else {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            }
                        
                        
                        //$ckbaris=mysql_query("select id_menu_tree from menus where id_menu='".$menus['id_menu']."'");
                        //$baris=mysql_num_rows($ckbaris);
                        
                        if($menus['id_menu_tree']!=1) {
                            $menusel="&nbsp;&nbsp;-&nbsp;".$menus['nm_menu'];
                        } else {
                            $menusel=$menus['nm_menu'];
                        }
                        
                        ?> 
                    <option value="<?=$menus['url']?>" <?php if($gethal==$menus['url']) { echo "selected"; }?>><?=$menusel;?></option> 
                <?php } ?>
                </select> 
                
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
					<!-- <li class="dropdown" id="header-notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge">7</span>						
						</a>
						
					</li> -->
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- <li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">3</span>
						</a>
						
					</li> -->
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<!-- <li class="dropdown" id="header-tasks">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge">3</span>
						</a>
						
					</li> -->
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user" style="float:right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="img/avatars/ava1.png" />
							<?php 
                            
                            $nm=mysql_fetch_array(mysql_query("select nama from account where username='".$_SESSION['username']."'"));
                            
                            ?>
                            <span class="username"><?=ucfirst($nm['nama']);?></span>&nbsp;
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="index.php?halaman=profil_user"><i class="fa fa-user"></i> Profil akun</a></li>
							<li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<!--<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>-->
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<!--<li class="active">
								<a href="index.php">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>					
							</li>-->
                            <?php 
                            
                            if($_REQUEST['kode']!="") { 
                                $kode=$_REQUEST['kode'];
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&kode=".$kode;
                            } else if(($_REQUEST['kode']!="")&&($_REQUEST['id']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            } else {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            }
                            
                            if($_REQUEST['halaman']!="") {
                            
                            $qrya="select id_menu from menus where url like '$gethal%'";
                            $ck=mysql_query($qrya);
                            $dtck=mysql_fetch_array($ck);
                            //echo "<br>".$dtck['id_menu'];
                            }
                            
                            $qry="select a.id_menu, a.id_menu_tree, b.nm_menu, b.url, b.custom_class from account_menu as a, menus as b where a.id_menu=b.id_menu and a.id_menu_tree=b.id_menu_tree and a.id_menu='".$dtck['id_menu']."' and username='".$_SESSION['username']."' order by a.id_menu_tree asc";
                            $sub=mysql_query($qry);
                            while($submenu=mysql_fetch_array($sub)) {
                                
                            
                            //cek_hak_akses($submenu['id_menu'], $submenu['id_menu_tree'], $_SESSION['username']);    
                            
                            
                            ?>
                            <li>
								<a href="<?=$submenu['url'];?>">
								<i class="<?=$submenu['custom_class']?>"></i> <span class="menu-text"><?=$submenu['nm_menu']?></span>
								<span class="selected"></span>
								</a>					
							</li>
                            <?php }  ?>
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
                                    <?php 
									$halaman=str_replace("_", " ", ucfirst($_GET['halaman']));
									if(empty($halaman)) {
										$halaman="Beranda";	
									} 
									?>
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.php">Home</a>
										</li>
										<li><?=$halaman?></li>
									</ul>
									<!-- /BREADCRUMBS -->
                                    
									<div class="clearfix">
										<h3 class="content-title pull-left"><?=$halaman;?></h3>
										<!-- DATE RANGE PICKER -->
										<!-- <span class="date-range pull-right">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span> -->
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
                        
                        
                        <!-- KONTEN UTAMA -->
                        
                        <div class="row">
                        	<div class="col-md-12">
                            

   	<?php
	
	$hal=$_GET['halaman'];
	if (empty($hal)){
			$hal="index2"; ?>
	
    
    <?php }

	if (isset($_SESSION['level']) && isset($_SESSION['username'])) {
		require_once $hal.".php";
	} else {
		lompat_ke("form_login.php");
	}
	
	?>
                        </div>
                        </div>
                        
                        <div class="divide-40"></div>
                        <!-- END KONTEN UTAMA -->
                        
						
                        
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
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
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="js/sparklines/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- FLOT CHARTS -->
	<script src="js/flot/jquery.flot.min.js"></script>
	<script src="js/flot/jquery.flot.time.min.js"></script>
    <script src="js/flot/jquery.flot.selection.min.js"></script>
	<script src="js/flot/jquery.flot.resize.min.js"></script>
    <script src="js/flot/jquery.flot.pie.min.js"></script>
    <script src="js/flot/jquery.flot.stack.min.js"></script>
    <script src="js/flot/jquery.flot.crosshair.min.js"></script>
	<!-- TODO -->
	<script type="text/javascript" src="js/jquery-todo/js/paddystodolist.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="js/timeago/jquery.timeago.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="js/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="js/gritter/js/jquery.gritter.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>