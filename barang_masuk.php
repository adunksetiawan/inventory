<?php

$self           = $_SERVER['PHP_SELF'];
$page           = $_REQUEST['module'];
$page           = $_REQUEST['page']?$_REQUEST['page']:"1";
$maxrow         = $_REQUEST['maxrow']?$_REQUEST['maxrow']:"15";

$tgl_awal           = $_REQUEST['tgl_awal'];
$tgl_akhir          = $_REQUEST['tgl_akhir'];

$pesan="SELECT * FROM beli where true";
$pesan.=" order by inc desc";    
$sqlnav=$pesan;
$pesan.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";

                            if($_REQUEST['kode']!="") { 
                                $kode=$_REQUEST['kode'];
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&kode=".$kode;
                            } else if(($_REQUEST['kode']!="")&&($_REQUEST['id']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            } else if($_REQUEST['act']!="") {
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&act=".$_REQUEST['act'];
                            } else {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            }
                            
                            //echo $gethal;
                            
                            if($_REQUEST['halaman']!="") {
                            
                            $qrya="select id_menu, id_menu_tree from menus where url like '$gethal%'";
                            $ck=mysql_query($qrya);
                            $dtck=mysql_fetch_array($ck);
                            //echo "<br>".$dtck['id_menu'];
                            
                            cek_hak_akses($dtck['id_menu'], $dtck['id_menu_tree'], $_SESSION['username']);
                            }


$cari           = $_REQUEST['tcari'];
$sql="SELECT * FROM barang where true"; 
$sumQty="SELECT SUM(qty) AS totalQty FROM stok where true";

                            if($_REQUEST['kode']!="") { 
                                $kode=$_REQUEST['kode'];
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&kode=".$kode;
                            } else if(($_REQUEST['kode']!="")&&($_REQUEST['id']!="")) {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            } else if($_REQUEST['act']!="") {
                                $gethal="index.php?halaman=".$_REQUEST['halaman']."&act=".$_REQUEST['act'];
                            } else {
                                $gethal="index.php?halaman=".$_REQUEST['halaman'];
                            }
                            
                            //echo $gethal;
                            
                            if($_REQUEST['halaman']!="") {
                            
                            $qrya="select id_menu, id_menu_tree from menus where url like '$gethal%'";
                            $ck=mysql_query($qrya);
                            $dtck=mysql_fetch_array($ck);
                            //echo "<br>".$dtck['id_menu'];
                            
                            cek_hak_akses($dtck['id_menu'], $dtck['id_menu_tree'], $_SESSION['username']);
                            }

if($cari!="") {
    $sql.=" and barang_nama LIKE '%$cari%'";
    $sumQty.=" and barang_nama LIKE '%$cari%'";
}
$sql.=" order by inc asc";
$sumQty.=" order by barang_id asc"; 
$sqlnav=$sql;
$sql.=$page?" LIMIT ".$maxrow." offset ".(($page-1)*$maxrow)."":"";


?>
<script>
function myFunction(url) {
    window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=600");
}
</script>
<div class="row">
    <div class="col-lg-4">  <!--pencarian produk-->
        <!-- BASIC -->
        <div class="box border red">
            <div class="box-title">
                <h4>Pencarian Input Stokist</h4>
            </div>
            <div class="box-body big">
                <form class="form-inline" role="form" method="post" action="index.php?halaman=barang_masuk_cari">
                    <div class="form-group" id="sandbox-container">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label> <input style="width:100px" name="tgl_awal" type="text" class="form-control" id="datepicker" placeholder="Tanggal awal">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label> <input style="width:100px" name="tgl_akhir" type="text" class="form-control" id="datepicker1" placeholder="Tanggal akhir">
                    </div>&nbsp;<button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                </form>
            </div>
        </div><!-- /BASIC -->
    </div> <!--END pencarian produk-->

    <div class="col-lg-6" style="margin-left:100px"> <!--pencarian stok-->
        <!-- BASIC -->
        <div class="box border red">
            <div class="box-title">
                <h4><i class="fa fa-search"></i>Pencarian Stok</h4>
            </div>
            <div class="box-body big">
                <form class="form-inline" role="form"  method="post" action="index.php?halaman=barang_masuk">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                    <input name="tcari" type="text" class="form-control" id="exampleInputEmail2" placeholder="Cari..">
                  </div>
                  <button name="bcari" type="submit" value="Cari" class="btn btn-inverse">Cari</button>
                </form>
            </div>
        </div>
        <!-- /BASIC -->
    </div> <!--END pencarian stok-->
</div>

<div class="row">
    <div class="col-lg-4"><!--PRODUK-->
        <!-- BOX -->
        <div class="box border red">
            <div class="box-title">
                <h4><?=$halaman?></h4>

                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="remove"></a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th id="namaField">No.Trans</th>

                            <th id="namaField">No.Fak</th>

                            <th id="namaField">Tgl. Trans</th>

                            <th id="namaField">Nama Supplier</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $query=mysql_query($pesan);
                            while($row=mysql_fetch_array($query)){
                                if ($warna==$warna1){
                                    $warna=$warna2;
                                }
                                else{
                                    $warna=$warna1;
                                }
                        ?>

                        <tr bgcolor="<?php echo $warna; ?>">
                            <td><a href="#" onclick="myFunction('beli_detail.php?id=<?=$row['beli_id']; ?>')">
                            <!-- onclick="javascript:window.open('beli_detail.php?id=&lt;?php echo $row['beli_id']; ?&gt;','Lihat Data','width=790,height=400,scrollbars=1');" -->
                            <?php echo $row['beli_id']; ?></a></td>

                            <td><?php echo "$row[no_fak]"; ?></td>

                            <td><?php echo "$row[tgl_trans]"; ?></td>

                            <td><?php echo "$row[supplier_nama]"; ?></td>
                        </tr><?php } ?>

                        <tr>
                            <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=barang_masuk&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=barang_masuk.php");?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /BOX -->
    </div><!--END PRODUK-->

    <!--STOK-->
    <div class="col-lg-6" style="margin-left:100px">
        <!-- BOX -->
        <div class="box border red">
            <div class="box-title">
                <h4><i class="fa fa-archive"></i><?=$halaman?></h4>
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
                <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th id="namaField">No</th>
                    <th id="namaField">ID Barang</th>
                    <th id="namaField">Nama Barang</th>
                    <th id="namaField">Kategori</th>
                    <th id="namaField">Qty</th>
                    <th id="namaField">Packing</th>
                    <?php if($_REQUEST['act']!="") { ?>
                    <th id="namaField" colspan="2">Menu</th>
                    <?php } ?>
                  </tr>
                </thead>
              <tbody>
                <?php
                    $no=1;
                    $query=mysql_query($sql);
                    while($data=mysql_fetch_array($query))
                    {

                    $sqls="SELECT * FROM stok where barang_id='".$data['inc']."'";
                    $qrys=mysql_query($sqls);
                    $dtstok=mysql_fetch_array($qrys);
                    
                echo "
              <tr bgcolor=$warna>
                <td>$no</td>
                <td>$data[barang_id]</td>
                <td>$data[barang_nama]</td>
                <td>$data[barang_kategori]</td>
                <td>";
                 
                if($dtstok['qty']=="") {
                    echo "-";
                } else {
                    echo $dtstok['qty'];
                }
                
                echo "</td>
                <td>$data[satuan]x$data[kg]$data[ukuran]</td>
                "; ?>
                <?php if($_REQUEST['act']!="") { ?>
                <?php if($_REQUEST['act']=="ubah") {?>
                <td colspan="2">
                    <a class="btn btn-warning" href="<?php echo "index.php?halaman=form_ubah_stok&id=$dtstok[barang_id]";?>"><div id="tombol"><i class="fa fa-edit"></i>&nbsp;ubah</div></a>
                </td>
                <?php } else if($_REQUEST['act']=="hapus") { ?>
                <td colspan="2">
                    <a class="btn btn-danger" href="<?php echo "proses.php?proses=hapus_stok&id=$dtstok[barang_id]"; ?>" 
                    onclick="return confirm('Apakah Anda akan menghapus data stok ini ?')"><div id="tombol"><i class="fa fa-trash-o"></i>&nbsp;hapus</div></a>
                </td>
                <?php
                }
                }
                echo "</tr>";
                $no++;
                } ?>
               <tr>
               <?php 
               if($_REQUEST['act']!="") {
                    $rowspan='colspan="8"';
               } else {
                    $rowspan='colspan="6"';
               }
               ?>
                <td colspan="4"; style="background-color:#333;color:#FFF;border:none" align="right">total :</td>
                <td id="namaField" style="background-color:#999;color:#FFF;border:none">
                    <?php
                        $qsumQty=mysql_query($sumQty);
                        $dsumQty=mysql_fetch_array($qsumQty);
                        echo $dsumQty['totalQty'];
                    ?>
                </td>
                <td id="" style="background-color:#999;color:#FFF;border:none"></td>
              </tr>
              <tr>
              <td colspan="8" align="center"><?php _navpage($koneksi,$sqlnav,$maxrow,$page,"?halaman=stok&maxrow=$maxrow&status_absen=$status_absen&$start=$start&end=$end&show=stok.php");?>
              </td>
              </tr>
              </tbody>
            </table>
            </div>
            </div>
            <!-- /BOX -->
            </div> <!--END stok-->
</div>
