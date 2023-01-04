<?php
#koneksi ke oracle database
$username = "mvdemo";
$password = "mvdemo";
$host = "localhost/XE";

$conn = oci_connect($username,$password,$host);

if(!$conn){
  die("Koneksi Gagal ".oci_error());
}
