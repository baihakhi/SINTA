<?php
require_once('sidebar.php');
/*if($status=="anggota"){
		header('Location:./index.php');
	}
*/
$message = "Data berhasil dihapus";
if(isset($_GET['data'])){
	if($_GET['data']=='dosen'){
		$nip = $_GET['nip'];
		$query = "DELETE FROM dosen WHERE nip='".$nip."'";
		$result = $con->query( $query );
		echo '<script type="text/javascript">alert("Data dosen berhasil dihapus.");';
		echo 'window.location.href="dosen_edit.php";';
		echo '</script>';
	}elseif($_GET['data']=='eksekutif'){
		$nip = $_GET['nip'];
		$query = "DELETE FROM eksekutif WHERE nip='".$nip."'";
		$result = $con->query( $query );
		echo '<script type="text/javascript">alert("Data eksekutif berhasil dihapus.");';
		echo 'window.location.href="dosen_edit.php";';
		echo '</script>';
	}elseif($_GET['data']=='admin'){
		$id_admin = $_GET['id_admin'];
		$query = "DELETE FROM admin WHERE id_admin='".$id_admin."'";
		$result = $con->query( $query );
		echo '<script type="text/javascript">alert("Data admin berhasil dihapus.");';
		echo 'window.location.href="dosen_edit.php";';
		echo '</script>';
	}elseif($_GET['data']=='mahasiswa'){
		$nim = $_GET['nim'];
		$query = "DELETE FROM mahasiswa WHERE nip='".$nip."'";
		$result = $con->query( $query );
		echo '<script type="text/javascript">alert("Data mahasiswa berhasil dihapus.");';
		echo 'window.location.href="dosen_edit.php";';
		echo '</script>';
	}else{
		echo 'Tidak ada data dihapus.';
	}
	
}else{
	echo 'Tidak ada data dihapus. Data tidak dikenali.';
}

$con->close();
?>