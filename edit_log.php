<?php
include('fn.php');
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

if (isset($_POST["ubah"])) {

  //kamus
  $arr = array();

  //algo
  array_push($arr,$tanggal);
  array_push($arr,!empty($_POST['progress']) ? readInput($_POST['progress']) : '');
  array_push($arr,!empty($_POST['catatan']) ? readInput($_POST['catatan']) : '');

//  print_r($arr);
  if(updateLog($arr,$tanggal) == true){
    echo "updated";
  }else {
    echo "failed";
  }
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Edit Catatan Mahasiswa
     </title>
   </head>
   <body>
     <h1>Catatan Bimbingan</h1>
     <form method="post">

       <table title="perkembangan TA mahasiswa">
         <tr>
           <td>Tanggal</td>
           <td>:      </td>
           <td><?= $tanggal?> </td>
         </tr>
         <tr>
           <td title="perkembangan TA mahasiswa">Perkembangan</td>
           <td>:           </td>
           <td>
             <select name="progress">
               <optgroup label="BAB I">
                 <option value="bab1-1" <?= $progress=='bab1-1'? 'selected="selected"':'' ?>>Tujuan</option>
                 <option value="bab1-2" <?= $progress=='bab1-2'? 'selected="selected"':'' ?>>Abstraksi</option>
                 <option value="bab1-3" <?= $progress=='bab1-3'? 'selected="selected"':'' ?>>Rumusan Masalah</option>
               </optgroup>
               <optgroup label="BAB 2">
                 <option value="bab2-1" <?= $progress=='bab2-1'? 'selected="selected"':'' ?>>Penjabaran</option>
                 <option value="bab2-2" <?= $progress=='bab2-2'? 'selected="selected"':'' ?>>Btcbctcbt</option>
                 <option value="bab2-3" <?= $progress=='bab2-3'? 'selected="selected"':'' ?>>Rchrchrch</option>
               </optgroup>
               <optgroup label="BAB 3">
                 <option value="bab3-1" <?= $progress=='bab3-1'? 'selected="selected"':'' ?>>Penutup</option>
                 <option value="bab3-2" <?= $progress=='bab3-2'? 'selected="selected"':'' ?>>Kesimpulan</option>
                 <option value="bab3-3" <?= $progress=='bab3-3'? 'selected="selected"':'' ?>>Dapus</option>
               </optgroup>
             </select>
           </td>
         </tr>
         <tr>
           <td valign="top">Catatan</td>
           <td valign="top">:</td>
           <td>
           <textarea name="catatan" rows="8" cols="80"><?= $catatan ?></textarea>
         </td>
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
