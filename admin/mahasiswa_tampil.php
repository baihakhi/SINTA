<?php
include('../includes/fn.php');

if (!isset($_SESSION['username'])){
    header("location:../logout.php");
//  echo "session unset";
  } elseif ($_SESSION['akses']!="Administrator") {
    header("location:../logout.php");
  }
?>
<html>
		<head>
      <meta charset="utf-8">
      <script src="../js/jquery.js"></script>
      <script src="../js/ajax.js"></script>
      <?php include '../bootstrap.html'; ?>
    </head>
		<body>
		<br/>
			<div class="container">
			  <ul class="nav nav-pills">
				<button class="btn btn-default" onclick="window.location.href='../logout.php'">Logout</button>
			  </ul>
			<div class="container">
			<h3>Daftar Mahasiswa</h3>
			<p id="kolom"><input id="myInput" type="text" onkeyup="cari()" size="30" placeholder="Cari data tugas akhir"/>
			<button class="btn btn-default">Cari</button>
      <button class="btn btn-default" onClick="window.location.href='mahasiswa_add.php'">Tambah Mahasiswa</button>
			<table id="myTable" class="table table-hover">

				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Judul Tugas Akhir</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$i = 1;
						$row = getAllTa();
						while($mhs = $row->fetch_object()){
              $nim = $mhs->nim;

							echo '<tr>';
							echo '<td><center>'.$i.'</center></td>';
							echo '<td><center><a href=info_mahasiswa.php?nim='.$nim.'>'.$nim.'</center></td>';
							echo '<td>'.$mhs->nama.'</td>';
							echo '<td>'.$mhs->judul.'</td>';
              ?>
              <td>
                <a href="mahasiswa_edit.php?nim=<?= $nim ?>">edit</a>
                <div data-id=<?= $nim ?> style="display:inline">
                  <button onClick="$(this).HapusMhs()">hapus</button>
                </div>
              </td>
            <?php
              echo "</tr>";
							$i++;
						}
					?>
				</tbody>
			</table>
			</div>
		</body>
		<script src="../js/script.js"></script>
</html>
