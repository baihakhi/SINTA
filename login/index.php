<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('../includes/fn.php');

	$error_nim = '';
	$error_nip = '';
	$error_password = '';
	$error_username = '';
	$error='';

if (isset($_POST["submit"])){
	$level= readInput($_POST['level']);
	if ($level == ''){
		$error_level = "Harus Dipilih ";
		$valid_level = false;
	}else{
		$valid_level = true;
	}

	if ($valid_level){
		$level = readInput($level);
		$username = $_POST['email'];
		$password = $_POST['password'];
		$username = readInput($username);
		$password = readInput($password);

		if($level == "Dosen"){

			$result = getSpesificRow2('dosen', 'nip', $username, 'password', $password);
			$row = $result->fetch_object();
			if (($result->num_rows) == 1){
				$_SESSION['nip']=$username;
				header("location: dosen.php");
			}else{
				?>
				<script language="JavaScript">
					alert('Username & Password Salah');
					document.location='index.php'
				</script>
				<?php
			}
		}elseif($level == "Mahasiswa"){

			$result = getSpesificRow2('mahasiswa', 'nim', $username, 'password', $password);
			$row = $result->fetch_object();
			if (($result->num_rows) == 1){
				$_SESSION['nim']=$username;
				header("location: mahasiswa.php");
			}else{
				?>
				<script language="JavaScript">
					alert('Username & Password Salah');
					document.location='index.php'
				</script>
				<?php
			}
		}else{

			if($level == "Administrator"){
				$result = getSpesificRow2('admin', 'username', $username, 'password', $password);
				$row = $result->fetch_object();
				if (($result->num_rows) == 1){
					$_SESSION['username']=$username;
					header("location: admin.php");
				}else{
					?>
					<script language="JavaScript">
						alert('Username & Password Salah');
						document.location='index.php'
					</script>
					<?php
				}
			}elseif($level == "Eksekutif"){
				$result = getSpesificRow2('eksekutif', 'username', $username, 'password', $password);
				$row = $result->fetch_object();
				if (($result->num_rows) == 1){
					$_SESSION['username']= $username;
					header("location: eksekutif.php");
				}else{
					?>
					<script language="JavaScript">
						alert('Username & Password Salah');
						document.location='index.php'
					</script>
					<?php
				}
			}else{

			}

		}
			exit;
		}else{

		}

}

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
		<title>SINTA</title>

		<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	<title>Halaman Login Anggota</title>
	</head>
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
		</form>
		</div>
	</body>
</html>
