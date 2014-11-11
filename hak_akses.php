<?php 

require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$self 			= $_SERVER['PHP_SELF'];
$page			= $_REQUEST['module'];
$page			= $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow			= $_REQUEST['maxrow']?$_REQUEST['maxrow']:"25";

$ck=mysql_query("select nama from account where username='".$_REQUEST['id']."'");
$dt=mysql_fetch_array($ck);

$menu=mysql_query("select * from menus order by id asc");
$count=mysql_num_rows($menu);


$akun="SELECT * FROM menus as a, account_menu as b where a.id_menu=b.id_menu and a.id_menu_tree=b.id_menu_tree and b.username='".$_REQUEST['id']."'";
if($cari!="") {
	$akun.=" and a.nm_menu like '$cari%'";	
}
$akun.=" order by a.id asc";	
$sqlnav=$akun;
$akun.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";


?>

<script>
$(document).ready(function() {
    /*$('input:checkbox').change( function() {
    
        if($('input:checkbox').prop('checked')) {
        
            var id_menu     = $(this).val();
        
            var url='proses_akses.php?act=add&uid=<?=$_REQUEST['id']?>&id_menu='+id_menu;
        
            $.ajax({
                url:url,
                success:function(result){
                    alert(result);
                }
            });
        } else {
            var id_menu     = $(this).val();
        
            var url='proses_akses.php?act=del&uid=<?=$_REQUEST['id']?>&id_menu='+id_menu;
        
            $.ajax({
                url:url,
                success:function(result){
                    alert("Menu dihapus");
                }
            });
        }
    });*/
    
    
    $("#menus").change(function() {
       
       var menus   = $(this).val();
       
       if(menus!="") { 
       
       var url='proses_akses.php?act=add&uid=<?=$_REQUEST['id']?>&id_menu='+menus;
        
            $.ajax({
                url:url,
                success:function(result){
                    alert(result);
                    location.reload();
            }
       });
       } 
    });
});
</script>

<div class="row">
<div class="col-md-12">
								<!-- BOX -->
								<div class="box border pink">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Pengaturan Hak Akses</h4>
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
									<div class="box-body">
										<form class="form-horizontal" method="post" action="proses_akses.php">
										  
                                          <div class="form-group">
											 <label class="col-md-4 control-label">User : </label> 
											 <div class="col-md-4"> 
                                                    <input type="text" readonly class="form-control" placeholder="User" value="<?=$dt['nama']?>">
                                                    <input type="hidden" value="<?=$_REQUEST['id'];?>" name="uid" />
                                                    <input type="hidden" value="<?=$count;?>" name="id" />  
                                             </div>
										  </div>
										  <div class="form-group">
											 <label class="col-md-4 control-label">Menu : </label> 
											 <div class="col-md-8"> 
                                             
												 <!--<label class="checkbox"> <input <?=$checked;?> type="checkbox" class="uniform" id="<?=$no++;?>" name="menus" value="<?=$dtmenu['id_menu']."-".$dtmenu['id_menu_tree']?>"><?=$dtmenu['nm_menu']?></label>-->
                                                 <select name="menus" id="menus" class="form-control" style="width: 200px;">
                                                 <option value="">Pilih hak akses</option>
                                                 <?php 
                                             $no=1;
                                             while($dtmenu=mysql_fetch_array($menu)) {
                                                
                                             $qry="select * from account_menu where username='".$_REQUEST['id']."' and id_menu='".$dtmenu['id_menu']."' and id_menu_tree='".$dtmenu['id_menu_tree']."'";   
                                             $ckmn=mysql_query($qry);
                                             $dtmn=mysql_num_rows($ckmn);   
                                             
                                             if($dtmn>=1) {
                                                $checked="checked";
                                             } else {
                                                $checked="";
                                             }
                                             
                                             ?>
                                                    <option value="<?=$dtmenu['id_menu']."-".$dtmenu['id_menu_tree']?>"><?=$dtmenu['nm_menu']?></option>
                                                    
                                             <?php } ?>
                                                 </select> 
											 
                                             </div>
										  </div>										  										  
										  
										</form>
									</div>
								</div>
								<!-- /BOX -->
							</div>
                            </div>

<div class="row">
<div class="col-lg-12">
										<!-- BASIC -->
										<div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-align-justify"></i>Hak akses untuk user : <?=$dt['nama']?></h4>
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

<table class="table table-hover table-bordered">
<thead>
  <tr>
    <th id="namaField">Nama menu</th>
    <th id="namaField">Url</th>
    <th colspan="3" align="center"><center>Aksi</center></th>
  </tr>
  </thead>
  <tbody>
  <?php
  	
	$qakun=mysql_query($akun);
  while($dakun=mysql_fetch_array($qakun))
  {
	  
	  echo "
  <tr bgcolor=$warna>
    <td>$dakun[nm_menu]</td>
    <td>$dakun[url]</td>
	</td>
	<td align=center>";
	?>
	<a href="proses_akses.php?act=del&uid=<?=$_REQUEST['id']?>&id_menu=<?=$dakun['id_menu']."-".$dakun['id_menu_tree'];?>" 
		onclick="return confirm('Apakah Anda akan menghapus data akun ini ?')" class="btn btn-danger">Hapus hak akses</a>
       
	<?php 
	echo "
    </td>
  </tr>";
  }
  ?>
  <tr>
                                              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=data_menu&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=data_menu.php");?>
                                              </td>
                                              </tr>
  </tbody>
</table>
</div>
								</div>
								<!-- /BOX -->
							</div>
</div>