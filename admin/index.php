<?php
include('../includes/fn.php');

if (!isset($_SESSION['username'])){
  header("location:../logout.php");
}
$akses = $_SESSION['akses'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laman Admin</title>
  </head>
  <body>
    <div>
      <a href="dosen_tampil.php">ini dosen</a>
    </div>
    <div>
      <a href="eksekutif_tampil.php">ini eksekutif</a>
    </div>
    <div>
      <a href="mahasiswa_tampil.php">ini mahasiswa</a>
    </div>
<!--
    <div>
      <a href="eksekutif_tampil.php">ini eksekutif</a>
    </div>
-->
  </body>
</html>
