<?php

require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$idkat      = $_REQUEST['idkat'];

$ck=mysql_query("select kode_kat, nm_kat from barang_kategori where kode_kat='$idkat'");
$dtkat=mysql_fetch_array($ck);

$qry="select barang_id from barang where barang_kategori='$dtkat[nm_kat]' order by inc desc";
$ckid=mysql_query($qry);
$rowbrg=mysql_num_rows($ckid);
$dtbrg=mysql_fetch_array($ckid); 

$pecah=explode("-", $dtbrg['barang_id']);

$no=1;

if($rowbrg>0) {
    $kal=$pecah[1]+$no;
    
    //echo $kal;
    
    if($kal>"0"&&$kal<=9) {
        $kode=$dtkat['kode_kat']."-00".$kal;
    } else if($kal>="10"&&$kal<=99) {
        $kode=$dtkat['kode_kat']."-0".$kal;
    } else if($kal>="100") {
        $kode=$dtkat['kode_kat']."-".$kal;
    }
    echo $kode;
} else {
    $kal=$pecah[1]+$no;
    echo $kode=$dtkat['kode_kat']."-00".$kal;
}



?>