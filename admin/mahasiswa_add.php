<?php
include_once('../includes/fn.php');

if (!isset($_SESSION['akses'])){
//  header("location:../logout.php");
  echo "session unset";
}elseif (($_SESSION['akses']) != "Administrator"){
//  header("location:../logout.php");
  echo "bukan admin";
  echo $_SESSION['username'];
}

//algoritma
if (isset($_POST["simpan"])) {

  //kamus
  $arr = array();
//  $nim = ;

  //algo
  array_push($arr,!empty($_POST['nim']) ? readInput($_POST['nim']) : '');
  array_push($arr,!empty($_POST['nama']) ? readInput($_POST['nama']) : '');
  array_push($arr,!empty($_POST['pass']) ? readInput($_POST['pass']) : '');

  //  print_r($arr);
  if(tambahMhs($arr)){
  //    echo "updated";
    header("location:mahasiswa_tampil.php");
  }else {
    print_r($arr);
    echo "failed";
  }
}
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Input Catatan Mahasiswa
     </title>
   </head>
   <body>
     <h1>Tambah Data Mhs</h1>
     <form class="" method="post">

       <table title="Data Mhs">
         <tr>
           <td>NIM</td>
           <td>:      </td>
           <td><input type="text" name="nim" title="masukkan nim mahasiswa" placeholder="240456000556"></td>
         </tr>
         <tr>
           <td>Nama</td>
           <td>:      </td>
           <td><input type="text" name="nama" title="masukkan nama mahasiswa" placeholder="Michele Jernao"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td>:      </td>
           <td><input type="password" name="pass" title="gunakan password yang unik" placeholder="dosenIF2017"></td>
         </tr>
       <tr>
         <td></td><td></td>
         <td align="right">
           <button type="submit" name="simpan">Simpan</button>
         </td>
       </tr>
       </table>
     </form>

   </body>
 </html>
