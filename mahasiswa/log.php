<?php
  include('includes/fn.php');

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <script src="<?= BASE;?>/jquery.js"></script>
     <script src="<?= BASE;?>/ajax.js"></script>
     <title>Catatan Bimbingan</title>
   </head>
   <body>
     <div>
       <h1 align="center">Catatan Bimbingan</h1>
     </div>
     <div>
       <table align="center">
         <tr>
           <th>Perkembangan</th>
           <th>Tanggal</th>
           <th>Status</th>
         </tr>
         <?php
            $query = getAllRow('log');
              while ($log = $query->fetch_object()) {
                $progress = $log->tag;
                $tanggal = $log->tanggal;
                $status = $log->persetujuan;

                $da =  date_create("$tanggal");

                if ($status==1) {
                  $status = "terverifikasi";
                }else {
                  $status = "belum terverifikasi";
                }
          ?>
          <tr>
            <td><a  href=info_log.php?q=<?= $tanggal ?> > <?= $progress ?> </a></td>
            <td><?= date_format($da,"d F Y"); ?></td>
            <td><?= $status ?></td>
            <td><a href="edit_log.php?q=<?= $tanggal ?>">ubah</a></td>
            <td>
              <div data-id="<?= $tanggal ?>">
                <button onClick="$(this).HapusLog()">hapus</button>
              </div>
            </td>
          </tr>
          <?php } ?>
       </table>
     </div>
   </body>
 </html>
