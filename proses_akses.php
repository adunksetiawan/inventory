<?php

/**
 * @author Agus Setiawan
 * @copyright 2014
 */
 

require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$id_menu    = $_REQUEST['id_menu'];
$uid         = $_REQUEST['uid'];
$act        = $_REQUEST['act'];

if($act=="add") {
    
    
    $pecah=explode("-", $id_menu);
    
     $qry="select * from account_menu where username='".$_REQUEST['uid']."' and 
     id_menu='".$pecah[0]."' and id_menu_tree='".$pecah[1]."'";   
     $ckmn=mysql_query($qry);
     $dtmn=mysql_num_rows($ckmn); 
     
     if($dtmn>=1) {
        echo "Sudah ada data yang sama";
     } else {
        $sql="insert into account_menu (id_menu, id_menu_tree, username) values ('$pecah[0]', '$pecah[1]', '$uid')";
        $rs=mysql_query($sql);
        echo "Menu ditambahkan";
     }
    
} else if($act=="del") {
    
    $pecah=explode("-", $id_menu);
    
    $sql="delete from account_menu where username='$uid' and id_menu='$pecah[0]' and id_menu_tree='$pecah[1]'";
    $rs=mysql_query($sql);
    
}


?>