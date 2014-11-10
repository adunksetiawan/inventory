<?php 

require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$ck=mysql_query("select nama from account where username='".$_REQUEST['id']."'");
$dt=mysql_fetch_array($ck);

$menu=mysql_query("select * from menus order by id asc");
$count=mysql_num_rows($menu);



?>

<script>
$(document).ready(function() {
    $('input:checkbox').change( function() {
    
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
											 <label class="col-md-4 control-label">Admin</label> 
											 <div class="col-md-4"> 
                                                    <input type="text" class="form-control" placeholder="User" value="<?=$dt['nama']?>">
                                                    <input type="hidden" value="<?=$_REQUEST['id'];?>" name="uid" />
                                                    <input type="hidden" value="<?=$count;?>" name="id" />  
                                             </div>
										  </div>
										  <div class="form-group">
											 <label class="col-md-4 control-label">Menu </label> 
											 <div class="col-md-8"> 
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
												 <label class="checkbox"> <input <?=$checked;?> type="checkbox" class="uniform" id="<?=$no++;?>" name="menus" value="<?=$dtmenu['id_menu']."-".$dtmenu['id_menu_tree']?>"><?=$dtmenu['nm_menu']?></label> 
											 <?php } ?>
                                             </div>
										  </div>										  										  
										  
										</form>
									</div>
								</div>
								<!-- /BOX -->
							</div>
                            </div>