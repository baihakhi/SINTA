<?php
include_once('fn.php');

  //algoritma
  if (isset($_GET['q'])){
    $q = readInput($_GET['q']);
    $query = getSpesificRow('log', 'tanggal', $q);
    while ($log = $query->fetch_object()) {
      $nim = $log->nim;
      $progress = $log->tag;
      $tanggal = $log->tanggal;
      $catatan = $log->catatan;
      $status = $log->persetujuan;
    }
  }
  else {
    header('Location:/#');
  }

  if(isset($_POST['verif'])){
    if(verifikasi($nim, $tanggal)){
    echo "status catatan mahasiswa ".$nim." diperbarui";
  }
  }

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Info Catatan</title>
   </head>
   <body>
       <div>
         <h1>Catatan Bimbingan</h1>
       </div>
      <form method="post">
       <div>
         <?= $progress ?>
       </div>
       <div>
         <table>
           <tr>
             <td>tanggal</td>
             <td>:</td>
             <td><?= $tanggal ?></td>
           </tr>
           <tr>
             <td>status</td>
             <td>:</td>
             <td><?= $status ?></td>
           </tr>
         </table>
       </div>
       <div>
         <?= $catatan ?>
       </div>
       <div>
         <button type="submit" name="verif">setujui</button>
       </div>
     </form>
   </body>
 </html>
