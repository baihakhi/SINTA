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

  //algo
  array_push($arr,!empty($_POST['nip']) ? readInput($_POST['nip']) : '');
  array_push($arr,!empty($_POST['nama']) ? readInput($_POST['nama']) : '');
  array_push($arr,!empty($_POST['username']) ? readInput($_POST['username']) : '');
  array_push($arr,!empty($_POST['pass']) ? readInput($_POST['pass']) : '');

  //  print_r($arr);
  if(tambahEksekutif($arr,$nip) == true){
  //    echo "updated";
    header("location:eksekutif_tampil.php");
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
     <title>Input Data Eksekutif
     </title>
   </head>
   <body>
     <h1>Tambah Data Dosen Eksekutif</h1>
     <form class="" method="post">

       <table title="Data Dosen">
         <tr>
           <td>NIP</td>
           <td>:      </td>
           <td><input type="text" name="nip" title="masukkan nip dosen" placeholder="123456987000556"></td>
         </tr>
         <tr>
           <td>Nama</td>
           <td>:      </td>
           <td><input type="text" name="nama" title="masukkan nama dosen" placeholder="Nama Dosen, S. Kom"></td>
         </tr>
         <tr>
           <td>Username</td>
           <td>:      </td>
           <td><input type="text" name="username" title="masukkan nama dosen" placeholder="Namadosencakep"></td>
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
