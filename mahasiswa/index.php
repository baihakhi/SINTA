<?php
  include('../includes/fn.php');

  if (!isset($_SESSION['username'])){
    header("location:../logout.php");
//    echo "session unset";
  }elseif ($_SESSION['akses']!='Mahasiswa') {
//      echo $_SESSION['akses'];
      header("location:../logout.php");
  }else {
        $nim = $_SESSION['username'];
        $row = getSpesificRow('log','nim',$nim);
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <script src="../js/jquery.js"></script>
     <script src="../js/ajax.js"></script>
     <?php include '../bootstrap.html'; ?>
     <title>Catatan Bimbingan</title>
   </head>
   <body>

     <div>
       <h1 align="center">Catatan Bimbingan</h1>
       <button class="btn btn-default" onclick="window.location.href='../logout.php'">Logout</button>
       <p id="kolom"><input id="myInput" type="text" onkeyup="cari()" size="30" placeholder="Cari data mahasiswa"/>
       <button class="btn btn-default">Cari</button>
       <button class="btn btn-default" onClick="window.location.href='dosen_add.php'">Tambah Mahasiswa</button>
       <table id="myTable" class="table table-hover">
       </div>
     <div>
       <table align="center">
         <tr>
           <th>Perkembangan</th>
           <th>Tanggal</th>
           <th>Status</th>
         </tr>
         <?php
//            $query = getAllRow('log');
              while ($log = $row->fetch_object()) {
                $progress = $log->tag;
                $tanggal  = $log->tanggal;
                $status   = $log->persetujuan;
                $id       = $log->id_log;

                $da =  date_create("$tanggal");

                if ($status==1) {
                  $status = "terverifikasi";
                }else {
                  $status = "belum terverifikasi";
                }
          ?>
          <tr>
            <td><a  href=info_log.php?id=<?= $id ?> > <?= $progress ?> </a></td>
            <td><?= date_format($da,"d F Y"); ?></td>
            <td><?= $status ?></td>
            <td><a href="edit_log.php?id=<?= $id ?>">ubah</a></td>
            <td>
              <div data-id="<?= $id ?>">
                <button onClick="$(this).HapusLog()">hapus</button>
              </div>
            </td>
          </tr>
          <?php } ?>
       </table>
     </div>
   </body>
   <script src="../js/script.js"></script>

 </html>
