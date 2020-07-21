<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

$server =  "localhost";
$username = "root";
$password = "";
$database = "asijamu";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("");
mysql_select_db($database) or die("");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Phpmuvalidasi;

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$a = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des');
?>
