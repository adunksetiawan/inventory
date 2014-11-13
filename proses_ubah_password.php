<?php

require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$uid        = $_REQUEST['username'];
$nama       = $_REQUEST['nama'];
$paslama    = md5($_REQUEST['paslama']);
$pasbaru    = md5($_REQUEST['pasbaru']);

$qck=mysql_query("select password from account where username='$uid'");
$dtck=mysql_fetch_array($qck);

if($dtck['password']==$paslama) {
    $upd=mysql_query("update account set nama='$nama', password='$pasbaru' where username='$uid'");
    ?> 
    <script type="text/javascript">
        alert("Password anda telah berubah, silahkan login kembali.");
        document.location.href = 'logout.php';
    </script>
    
    <?php
    //lompat_ke("logout.php");
    } else { ?>
    <script type="text/javascript">
        alert("Password lama yang anda masukkan tidak sesuai.");
        document.location.href = 'index.php?halaman=profil_user';
    </script>;
    
    <?php //lompat_ke("index.php?halaman=profil_user");
}
?>