<?php
if (isset($_SESSION['email'])){
}
include('../includes/fn.php');

?>
<html>
		<head>
		<?php include '../bootstrap.html'; ?>
		</head>
		<body>
		<br/>
			<div class="container">
			  <ul class="nav nav-pills">
				<button class="btn btn-default" onclick="window.location.href='logout.php'">Logout</button>
			  </ul>
			<div class="container">
			<h3>Daftar Mahasiswa</h3>
			<p id="kolom"><input id="myInput" type="text" onkeyup="cari()" size="30" placeholder="Cari data tugas akhir"/>
			<button class="btn btn-default">Cari</button>
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
						$result = getAllTa();
						while($row = $result->fetch_object()){
							echo '<tr>';
							echo '<td><center>'.$i.'</center></td>';
							echo '<td><center>'.$row->nim.'</center></td>';
							echo '<td>'.$row->nama.'</td>';
							echo '<td>'.$row->judul.'</td>';
							$i++;
						}
					?>
				</tbody>
			</table>
			</div>
		</body>
		<script src="../js/script.js"></script>
</html>
