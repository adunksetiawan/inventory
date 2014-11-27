<?php 
									//$page=str_replace("_", " ", ucfirst($_GET['halaman']));
									$page=$_GET['halaman'];
                                    $code=$_GET['kode'];
                                    $aks=$_GET['act'];
                                    
                                    switch ($code) {
                                        case "barang_insert" : $halaman="Input Produk";
                                        break;
                                        case "kategori_insert" : $halaman="Input Kategori Produk";
                                        break;
                                        case "supplier_insert" : $halaman="Input Data Supplier";
                                        break;
                                        case "pelanggan_insert" : $halaman="Input Data Distributor";
                                        break;
                                        case "barang_masuk" : $halaman="Barang Stokist";
                                        break;
                                        case "penjualan" : $halaman="Stokist Distributor";
                                        break;
                                        case "kategori_barang_update" : $halaman="Ubah Kategori Produk";
                                        break;
                                        case "" : $halaman="Beranda";
                                        break;
                                    }
                                    
                                    switch ($page) {
                                                                      
                                        case "data_barang" : $halaman=ucfirst($_GET['act'])." Produk";
                                        break;
                                        case "data_supplier" : $halaman=ucfirst($_GET['act'])." Supplier";
                                        break;
                                        case "data_pelanggan" : $halaman=ucfirst($_GET['act'])." Distributor";
                                        break;
                                        case "barang_masuk" : $halaman=$_GET['act'].ucfirst($_GET['act'])." Barang Stokist";
                                        break;
                                        case "penjualan" : $halaman=ucfirst($_GET['act'])." Stokist Distributor";
                                        break;
                                        case "form_beli" : $halaman=ucfirst($_GET['act'])." Input Stokist";
                                        break;
                                        case "form_jual" : $halaman=ucfirst($_GET['act'])." Input Stokist Distributor";
                                        break;
                                        case "stok" : $halaman=ucfirst($_GET['act'])." Stok";
                                        break;
                                        case "data_akun" : $halaman=ucfirst($_GET['act'])." Data Akun";
                                        break;
                                        case "data_menu" : $halaman=ucfirst($_GET['act'])." Menu";
                                        break;
                                        case "form_akun" : $halaman=ucfirst($_GET['act'])." Tambah User";
                                        break;
                                        case "form_ubah_akun" : $halaman=ucfirst($_GET['act'])." Ubah User";
                                        break;
                                        case "hak_akses" : $halaman=ucfirst($_GET['act'])." Hak Akses";
                                        break;
                                        case "form_menu" : $halaman=ucfirst($_GET['act'])." Tambah Menu";
                                        break;
                                        case "profil_user" : $halaman=ucfirst($_GET['act'])." Profil User";
                                        break;
                                        case "pelanggan" : $halaman=ucfirst($_GET['act'])." Stokist Pelanggan";
                                        break;
                                        case "form_pelanggan_jual" : $halaman=ucfirst($_GET['act'])." Input Stokist Pelanggan";
                                        break;
                                        case "data_kategori_barang" : $halaman=ucfirst($_GET['act'])." Data Kategori Produk";
                                        break;
                                        case "" : $halaman="Beranda";
                                        break;
                                    }
                                    
                                    
                                    
                                    
									?>