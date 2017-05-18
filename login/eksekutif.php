<?php
session_start();
if (isset($_SESSION['email'])){
require_once('db_login.php');
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	if($db->connect_errno){
		die("Couldnt connect to the  database: </br>". $db->connect_errno);
}}	
?>
<html>
		<head>
		<?php include 'bootstrap.html'; ?>
		</head>
		<body>
		<br/>
			<div class="container">
			  <ul class="nav nav-pills">
				<button class="btn btn-default" onclick="window.location.href='logout.php'">Logout</button>
			  </ul>
			<div class="container">
			<h3>Daftar Mahasiswa</h3>
			<p id="kolom"><input id="myInput" type="text" onkeyup="myFunction()" size="30" placeholder="Search..."/>
			<button class="btn btn-default">Search</button>
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
						require_once('db_login.php');
						$db = new mysqli($db_host, $db_username, $db_password, $db_database);
						if($db->connect_errno){
							die("Couldnt connect to the  database: </br>". $db->connect_errno);
						}
						$query = "SELECT mahasiswa.nim, mahasiswa.nama, tugas_akhir.judul FROM mahasiswa INNER JOIN tugas_akhir ON mahasiswa.id_ta=tugas_akhir.id_ta";
						$result = $db->query($query);
						if(!$result){
							die("Query Couldnt connect to the  database: </br>" .$db->error);
						}
						
						$i = 1;
						while($row = $result->fetch_object()){
							echo '<tr>';
							echo '<td><center>'.$i.'</center></td>';
							echo '<td><center>'.$row->nim.'</center></td>';
							echo '<td>'.$row->nama.'</td>';
							echo '<td>'.$row->judul.'</td>';
							$i++;
						}
						
						$db->close();
					?>
				</tbody>
			</table>
			</div>
		</body>
	<script>
		function myFunction() {
		  // Declare variables 
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			te = tr[i].getElementsByTagName("td")[2];
			tm = tr[i].getElementsByTagName("td")[1];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else if (te.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else if (tm.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			} 
		  }
		}
	</script>
</html>