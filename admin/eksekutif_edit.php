<?php
include('../includes/fn.php');

if (!isset($_SESSION['username'])){
  header("location:../logout.php");
//  echo "session unset";
  }elseif (!isset($_GET['nip'])) {
    header("location:dosen_tampil.php");
    }else {
      $id = $_GET['nip'];
      $row = getSpesificRow('eksekutif','nip', $id);
    }
//algoritma
  while ($dosen = $row->fetch_object()) {
    $nip  = $dosen->nip;
    $nama = $dosen->nama;
    $username = $dosen->username;
    $pass = $dosen->password;
  }

if (isset($_POST["ubah"])) {

  //kamus
  $arr = array();

  //algo
  array_push($arr,!empty($_POST['nip']) ? readInput($_POST['nip']) : '');
  array_push($arr,!empty($_POST['nama']) ? readInput($_POST['nama']) : '');
  array_push($arr,!empty($_POST['username']) ? readInput($_POST['username']) : '');
  array_push($arr,!empty($_POST['pass']) ? readInput($_POST['pass']) : '');

//  print_r($arr);
  if(updateEksekutif($arr,$nip) == true){
    echo "updated";
//    print_r($arr);
      header("location:eksekutif_tampil.php");
  }else {
    echo "failed";
//    print_r($arr);
  }
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Edit Data Dosen Eksekutif
     </title>
   </head>
   <body>
     <h1>Data Dosen Eksekutif</h1>
     <form method="post">

       <table title="Edit Data Dosen Eksekutif">
         <tr>
           <td>nip</td>
           <td>:      </td>
           <td><input type="text" name="nip" value="<?= $nip ?>"></td>
         </tr>
         <tr>
           <td>nama</td>
           <td>:      </td>
           <td><input type="text" name="nama" value="<?= $nama ?>"></td>
         </tr>
         <tr>
           <td>username</td>
           <td>:      </td>
           <td><input type="text" name="username" value="<?= $username ?>"></td>
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
