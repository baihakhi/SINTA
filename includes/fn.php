  <?php
session_start();

require('gfn.php');

//---------------------CATATAN

function hapusLog($id){
  global $con;

  $query = $con->query("DELETE FROM log WHERE id_log='$id'");
  return isset($query) ? checkQuery($query) : false;
}

function updateLog ($array,$id){
  global $con;

  $query = $con->query("UPDATE log SET tag='".$array[1]."', tanggal='".$array[0]."', catatan='".$array[2]."' WHERE id_log='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}

function tambahLog ($array){
  global $con;

  $query = $con->query("INSERT INTO log (tag, tanggal, catatan, persetujuan, id_log) VALUES ('$array[1]','$array[0]','$array[2]','$array[3]','$array[4]')");
  return isset($query) ? checkQuery($query) : false;
}

function verifikasi ($id){
  global $con;

  $query = $con->query("UPDATE log SET persetujuan=1 WHERE id_log='$id' ");
  return isset($query) ? checkQuery($query) : false;
}

//--------------------TUGAS AKHIR

function getAllTa(){
  global $con;

  $queryTaMhs = $con->query("SELECT mahasiswa.nim, mahasiswa.nama, tugas_akhir.judul FROM mahasiswa INNER JOIN tugas_akhir ON mahasiswa.id_ta=tugas_akhir.id_ta");
  return runQuery($queryTaMhs);
}

//---------------------DOSEN

function tambahDosen ($array){
  global $con;

  $query = $con->query("INSERT INTO dosen (nip, nama, password) VALUES ('$array[0]','$array[1]','$array[2]')");
  return isset($query) ? checkQuery($query) : false;
}

function hapusDosen($id){
  global $con;

  $query = $con->query("DELETE FROM dosen WHERE nip='$id'");
  return isset($query) ? checkQuery($query) : false;
}

function updateDosen ($array,$id){
  global $con;

  $query = $con->query("UPDATE dosen SET nip='".$array[0]."', nama='".$array[1]."', password='".$array[2]."' WHERE nip='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}

//---------------------EKSEKUTIF

function tambahEksekutif ($array){
  global $con;

  $query = $con->query("INSERT INTO eksekutif (nip, nama, username, password) VALUES ('$array[0]','$array[1]','$array[2]','$array[3]')");
  return isset($query) ? checkQuery($query) : false;
}

function hapusEksekutif ($id){
  global $con;

  $query = $con->query("DELETE FROM eksekutif WHERE nip='$id'");
  return isset($query) ? checkQuery($query) : false;
}

function updateEksekutif ($array,$id){
  global $con;

  $query = $con->query("UPDATE eksekutif SET nip='".$array[0]."', nama='".$array[1]."', username='".$array[2]."', password='".$array[3]."' WHERE nip='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}

//---------------------TUGAS AKHIR

function tambahTA ($array){
  global $con;

  $query = $con->query("INSERT INTO tugas_akhir (judul, nim, nip) VALUES ('$array[0]','$array[1]','$array[2]')");
  return isset($query) ? checkQuery($query) : false;
}

function updateTA ($array,$id){
  global $con;

  $query = $con->query("UPDATE tugas_akhir SET judul='".$array[0]."', nim='".$array[1]."', nip='".$array[2]."' WHERE id_ta='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}

//---------------------MAHASISWA

function tambahMhs ($array){
  global $con;

  $query = $con->query("INSERT INTO mahasiswa (nim, nama, password) VALUES ('$array[0]','$array[1]','$array[2]') ");
  return isset($query) ? checkQuery($query) : false;
}

function hapusMhs($id){
  global $con;

  $query = $con->query("DELETE FROM mahasiswa WHERE nip='$id'");
  return isset($query) ? checkQuery($query) : false;
}

function updateMhs ($array,$id){
  global $con;

  $query = $con->query("UPDATE mahasiswa SET nip='".$array[0]."', nama='".$array[1]."', password='".$array[2]."' WHERE nip='".$id."' ");
  return isset($query) ? checkQuery($query) : false;
}
?>
