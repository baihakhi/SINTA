<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once('db_login.php');
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	$error_nim = '';
	$error_nip = '';
	$error_password = '';
	$error_username = '';
	$nip='';
	$nim='';
	$username='';
	$password='';
	$error='';
	if ($db->connect_errno){
			die ("Could not connect to the database: <br />". $db->connect_error);
		}
	
if (isset($_POST["submit"])){
	$level= test_input($_POST['level']);
	if ($level == ''){
		$error_level = "Harus Dipilih ";	
		$valid_level = false;
	}else{
		$valid_level = true;
	}

	if ($valid_level){
		
		// Include our login information
		require_once('db_login.php');
		// Connect
		$db = new mysqli($db_host, $db_username, $db_password,$db_database);
		//escape input data
		$level = $db->real_escape_string($level);
		if($level == "Dosen"){
			$nip = $_POST['email'];
			$password = $_POST['password'];
			$nip = $db->real_escape_string($nip);
			$password = $db->real_escape_string($password);
			$query = "SELECT * FROM `dosen` WHERE `nip`='$nip' AND `password`='$password'";
			$result = $db->query( $query );
			$row = $result->fetch_object();
			if (($result->num_rows) == 1){
				session_start();
				$_SESSION['nip']=$nip; 
				header("location: dosen.php"); 	
			}else{
				?><script language="JavaScript">alert('Username & Password Salah');
				document.location='index.php'</script><?php
			}
		}elseif($level == "Mahasiswa"){
			$nim = $_POST['email'];
			$password = $_POST['password'];
			$nim = $db->real_escape_string($nim);
			$password = $db->real_escape_string($password);
			$query = "SELECT * FROM `mahasiswa` WHERE `nim`='$nim' AND `password`='$password'";
			$result = $db->query( $query );
			$row = $result->fetch_object();
			if (($result->num_rows) == 1){
				session_start();
				$_SESSION['nim']=$nim; 
				header("location: mahasiswa.php"); 	
			}else{
				?><script language="JavaScript">alert('Username & Password Salah');
				document.location='index.php'</script><?php
			}
		}else{
			$username = $_POST['email'];
			$password = $_POST['password'];
			$username = $db->real_escape_string($username);
			$password = $db->real_escape_string($password);
			if($level == "Administrator"){
				$query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";	
				$result = $db->query( $query );
				$row = $result->fetch_object();
				if (($result->num_rows) == 1){
					session_start();
					$_SESSION['username']=$username; 
					header("location: admin.php");
				}else{
					?><script language="JavaScript">alert('Username & Password Salah');
					document.location='index.php'</script><?php
				}
			}elseif($level == "Eksekutif"){
				$query = "SELECT * FROM `eksekutif` WHERE `username`='$username' AND `password`='$password'";
				$result = $db->query( $query );
				$row = $result->fetch_object();
				if (($result->num_rows) == 1){
					session_start();
					$_SESSION['username']= $username; 
					header("location: eksekutif.php");
				}else{
					 
				}
			}else{

			}
			
		}
			$db->close();
			exit;
		}else{
			
		}
		
}

	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<!DOCTYPE HTML> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Insert title here</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
<title>Halaman Login Anggota</title></head>
<body>

<div class="container">
  <div class="jumbotron" id="header">
    <h1 align="center">Sinta</h1>
  </div>
</div>
<section class="container">
			<section class="login-form">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="login">
					<h3 align="center">Sign In</h3>
					<input type="text" value="<?php if(isset($nim)){echo $nim;}?>" name="email" placeholder="Username" required class="form-control input-lg" />
					<span class="error"><?php if(isset($error_nim)){echo $error_nim;}?></span>
					<input type="password" value="<?php if(isset($password)){echo $password;}?>" name="password" placeholder="Password" required class="form-control input-lg" />
					<span class="error"><?php if(isset($error_password)){echo $error_password;}?></span>
					 <div class="form-group">
                                        <select name="level" id="level" class="form-control" required>
                                            <option value="">Pilih Level User</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Eksekutif">Eksekutif</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                        </select>
                                    </div>
					<button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
				</form>
			</section>
	</section>
<!--   <a  href="halaman_login_petugas.php">
	<input id="tombol" type="button" class="btn btn-default" name="petugas" value="Login Petugas">&nbsp; 
   </a>-->
	
</form>



</div>


</body>
</html>
<?php
$db->close();
?>