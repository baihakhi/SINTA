<?php
include_once('fn.php');

$today = getdate();
$hari = $today['weekday'];
$tanggal = $today['mday'];
$mon = $today['mon'];
$month = $today['month'];
$year = $today['year'];
$date = $hari.", ".$tanggal." ".$month." ".$year;
$datebase = "{$year}-{$mon}-{$tanggal}";

if (isset($_POST["simpan"])) {

  //kamus
  $arr = array();

  //algo
  array_push($arr,$datebase);
  array_push($arr,!empty($_POST['progress']) ? readInput($_POST['progress']) : '');
  array_push($arr,!empty($_POST['catatan']) ? readInput($_POST['catatan']) : '');
  array_push($arr,0);

  print_r($arr);
  tambahLog($arr);
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
     <h1>Catatan Bimbingan</h1>
     <form class="" method="post">

       <table title="perkembangan TA mahasiswa">
         <tr>
           <td>Tanggal</td>
           <td>:      </td>
           <td><?= $date?> </td>
         </tr>
         <tr>
           <td title="perkembangan TA mahasiswa">Perkembangan</td>
           <td>:           </td>
           <td>
             <select name="progress">
               <option value="-" disabled="disables" selected="selected" hidden="hidden">-</option>
               <optgroup label="BAB I">
                 <option value="bab1-1">Tujuan</option>
                 <option value="bab1-2">Abstraksi</option>
                 <option value="bab1-3">Rumusan Masalah</option>
               </optgroup>
               <optgroup label="BAB 2">
                 <option value="bab2-1">Penjabaran</option>
                 <option value="bab2-2">Btcbctcbt</option>
                 <option value="bab2-3">Rchrchrch</option>
               </optgroup>
               <optgroup label="BAB 3">
                 <option value="bab3-1">Penutup</option>
                 <option value="bab3-2">Kesimpulan</option>
                 <option value="bab3-3">Dapus</option>
               </optgroup>
             </select>
           </td>
         </tr>
         <tr>
           <td valign="top">Catatan</td>
           <td valign="top">:</td>
           <td>
           <textarea name="catatan" rows="8" cols="80"></textarea>
         </td>
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
