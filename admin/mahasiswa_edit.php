<?php
include('../includes/fn.php');

if (!isset($_SESSION['username'])){
    header("location:../logout.php");
//  echo "session unset";
  } elseif ($_SESSION['akses']!="Administrator") {
    header("location:../logout.php");
  } elseif (!isset($_GET['nim'])) {
      header("location:mahasiswa_tampil.php");
  } else {
      $id = $_GET['nim'];
      $row = getSpesificRow('mahasiswa','nim', $id);
  }
//algoritma
  while ($mhs = $row->fetch_object()) {
    $nim  = $mhs->nim;
    $nama = $mhs->nama;
    $pass = $mhs->password;
  }

if (isset($_POST["ubah"])) {

  //kamus
  $arr = array();

  //algo
  array_push($arr,!empty($_POST['nim']) ? readInput($_POST['nim']) : '');
  array_push($arr,!empty($_POST['nama']) ? readInput($_POST['nama']) : '');
  array_push($arr,!empty($_POST['pass']) ? readInput($_POST['pass']) : '');

//  print_r($arr);
  if(updateDosen($arr,$nim) == true){
//    echo "updated";
    header("location:mahasiswa_tampil.php");
//    print_r($arr);
  }else {
    echo "failed";
  }
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Edit Mahasiswa
     </title>
   </head>
   <body>
     <h1>Mhs</h1>
     <form method="post">

       <table title="Edit Data Dosen">
         <tr>
           <td>nim</td>
           <td>:      </td>
           <td><input type="text" name="nim" value="<?= $nim ?>"></td>
         </tr>
         <tr>
           <td>nama</td>
           <td>:      </td>
           <td><input type="text" name="nama" value="<?= $nama ?>"></td>
         </tr>
         <tr>
           <td>password</td>
           <td>:      </td>
           <td><input type="password" name="pass" value=""></td>
         </tr>
       <tr>
         <td></td><td></td>
         <td align="right">
           <button type="submit" name="ubah">Simpan</button>
         </td>
       </tr>
       </table>
     </form>

   </body>
 </html>
