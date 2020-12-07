<?php
try {
  // buat koneksi dengan database
  $db = new PDO('mysql:host=localhost;dbname=forumdiscussion', "root", "");
  
  // set error mode
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  
  // hapus koneksi
  $db = null;
}
catch (PDOException $e) {
  // tampilkan pesan kesalahan jika koneksi gagal
  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
  die();
}
?>