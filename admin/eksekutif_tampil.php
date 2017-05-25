<?php
include('../includes/fn.php');

if (!isset($_SESSION['username'])){
  header("location:../logout.php");
}
$akses = $_SESSION['akses'];

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
			<h3>Daftar Eksekutif</h3>
			<p id="kolom"><input id="myInput" type="text" onkeyup="cari()" size="30" placeholder="Cari data dosen pembimbing"/>
			<button class="btn btn-default">Cari</button>
      <button class="btn btn-default" onClick="window.location.href='eksekutif_add.php'">Tambah Dosen Eksekutif</button>
			<table id="myTable" class="table table-hover">

				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama Dosen</th>
<!--            <th></th>
-->
					</tr>
				</thead>
				<tbody>
				<?php
//        echo $akses;
						$i = 1;
						$result = getAllRow('eksekutif');
						while($row = $result->fetch_object()){
              $nip = $row->nip;

							echo '<tr>';
							echo '<td><center>'.$i.'</center></td>';
							echo '<td><center>'.$nip.'</center></td>';
              echo '<td>'.$row->nama.'</td>';
							echo '<td>'.$row->username.'</td>';
              if ($akses == "Administrator") {
                ?>
                  <td>
                    <a href="eksekutif_edit.php?nip=<?= $nip ?>">edit</a>
                    <div data-id=<?= $nip ?> style="display:inline">
                      <button onClick="$(this).HapusEksekutif()">hapus</button>
                    </div>
<!--                    <a href="repass.php?data=dosen&nip=<? $nip ?>">ubah</a>
-->
                   </td>
              <?php
            }
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
