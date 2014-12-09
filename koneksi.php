<?php

function koneksiDB($host="localhost:3306", $user="design_distribut", $pass="d1str1but0r")
{
   $koneksi =    @mysql_pconnect($host,$user,$pass) or
            die ("Terjadi Kesalahan: " . mysql_error());
   if ($koneksi){
      return $koneksi;   
   }
}
$conn=koneksiDB();
mysql_select_db("design_distributor",$conn);

?> 