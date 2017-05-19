  <?php
session_start();

require('gfn.php');

function hapusLog($id){
  global $con;

  $query = $con->query("DELETE FROM log WHERE tanggal='$id'");
  return isset($query) ? checkQuery($query) : false;
}

function updateLog ($array,$id){
  global $con;

  $query = $con->query("UPDATE log SET tag='".$array[1]."', tanggal='".$array[0]."', catatan='".$array[2]."' WHERE tanggal='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}

function tambahLog ($array){
  global $con;

  $query = $con->query("INSERT INTO log (tag, tanggal, catatan, persetujuan) VALUES ('$array[1]','$array[0]','$array[2]','$array[3]')");
  return isset($query) ? checkQuery($query) : false;
}

function verifikasi ($nim,$tanggal){
  global $con;

  $query = $con->query("UPDATE log SET persetujuan=1 WHERE nim='$nim' AND tanggal='$tanggal' ");
  return isset($query) ? checkQuery($query) : false;
}

function getAllTa(){
  global $con;

  $queryTaMhs = $con->query("SELECT mahasiswa.nim, mahasiswa.nama, tugas_akhir.judul FROM mahasiswa INNER JOIN tugas_akhir ON mahasiswa.id_ta=tugas_akhir.id_ta");
  return runQuery($queryTaMhs);
}

?>
