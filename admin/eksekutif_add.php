<?php
	//require_once('../sidebar.php');
	require_once('sidebar.php');
	/*if($status=="admin"){
		header('Location:./index.php');
	}*/
	
	$sukses=TRUE;
	// eksekusi tombol submit
	if (isset($_POST['submit'])) {
		// Cek Nim
		$nip=test_input($_POST['nip']);
		if ($nip=='') {
			$errorNip='wajib diisi';
			$validNip=FALSE;
		}elseif (!preg_match("/^[0-9]{18}$/",$nip)) {
			$errorNip='NIP harus terdiri dari 18 digit angka';
			$validNip=FALSE;
		}else{
			$query = " SELECT * FROM eksekutif WHERE nip='".$nip."'";
			$result = $con->query( $query );
			if($result->num_rows!=0){
				$errorNip="NIP sudah pernah digunakan, harap masukkan NIP lain";
				$validNip=FALSE;
			}
			else{
				$validNip = TRUE;
			}
		}

		// Cek Nama
		$nama=test_input($_POST['nama']);
		if ($nama=='') {
			$errorNama='wajib diisi';
			$validNama=FALSE;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
			$errorNama='hanya mengizinkan huruf dan spasi';
			$validNama=FALSE;
		}else{
			$validNama=TRUE;
		}

		// Cek username
		$username=test_input($_POST['username']);
		if ($username=='') {
			$errorUsername='wajib diisi';
			$validUsername=FALSE;
		}elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
			$errorUsername='Perhatikan kentuan username';
			$validUsername=FALSE;
		}else{
			$validUsername=TRUE;
		}

		// Cek password
		$password=test_input($_POST['password']);
		if ($password=='') {
			$errorPass='wajib diisi';
			$validPass=FALSE;
		}else{
			$validPass=TRUE;
		}

		// jika tidak ada kesalahan input
		if ($validNip && $validNama && $validPass && $validUsername) {
			$nip=$con->real_escape_string($nip);
			$nama=$con->real_escape_string($nama);
			$password=$con->real_escape_string($password);
			$username=$con->real_escape_string($username);

			$query = "INSERT INTO eksekutif (nip,nama,password,username) VALUES ('".$nip."','".$nama."','".$password."', '".$username."')";

			$hasil=$con->query($query);
			if (!$hasil) {
				die("Tidak dapat menjalankan query database: <br>".$con->error);
			}else{
				$sukses=TRUE;
			}
			$pesan_sukses="Berhasil menambahkan data.";
		}
		else{
			$sukses=FALSE;
		}
	}
?>
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="w3agile-validation w3ls-validation">
					<div class="panel panel-widget agile-validation">
						<div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="input-info">
								<h3>Form Tambah Eksekutif :</h3>
							</div>
							<div class="form-body form-body-info">
								<form method="POST" role="form" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<span class="label label-success"><?php if(isset($pesan_sukses)) echo $pesan_sukses;?></span><br>
									<label for="field-1">Nama&nbsp;<span class="at-required-highlight">* </span> 
									<span class="label label-warning"><?php if(isset($errorNama)) echo $errorNama;?></span></label>
									<div class="form-group">
										<input type="text" name="nama" id="nama" required="true" class="form-control" value="<?php if(!$sukses&&$validNama){echo $nama;} ?>" >
									</div>
									<label for="field-1">NIP&nbsp;<span class="at-required-highlight">* </span>
									<span class="label label-warning"><?php if(isset($errorNip)) echo $errorNip;?></span></label>
									<div class="form-group">
										<input type="text" name="nip" id="nip" required="true" class="form-control" value="<?php if(!$sukses&&$validNip){echo $nip;} ?>">
									</div>
									<label for="field-1">Username&nbsp;<span class="at-required-highlight">* </span> 
										<span id='username_availability_result'></span>
									<span class="label label-warning"><?php if(isset($errorUsername)) echo $errorUsername;?></span></label>
									<div class="form-group">
										<input type="text" name="username" id="username" required="true" data-minlength="6" class="form-control" placeholder="Username" value="<?php if(!$sukses&&$validUsername){echo $username;} ?>">
										<span class="help-block">Minimum of 6 characters            Hanya mengizinkan [a-z] [A-Z] [0-9]</span>
									</div>
									<label for="field-1">Password&nbsp;<span class="at-required-highlight">* </span>
									<span class="label label-warning"><?php if(isset($errorPass)) echo $errorPass;?></span></label>
									<div class="form-group">
									  <input type="password" name="password" data-minlength="6" class="form-control" id="password" placeholder="Password" pattern="^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" required="true" value="<?php if(!$sukses&&$validPass){echo $_POST['password'];} ?>">
									  <span class="help-block">Minimum of 6 characters            Harus menggunakan [a-z] [A-Z] [0-9]</span>
									</div>
									<label for="field-1">Confirm Password&nbsp;<span class="at-required-highlight">*</span></label>
									<div class="form-group">
									  <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm password" required="true">
									  <span id='message'></span>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" id="btnSubmit" name='submit' value="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
			<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 	<script type="text/javascript" >
 	$(document).ready(function(){
 		$('#password, #passwordConfirm').on('keyup', function () {
		  if ($('#password').val() == $('#passwordConfirm').val()) {
		    $('#message').html('Matching').css({'font-family':'sans-serif' ,'font-size':'10px', 'color':'green'});
		  } else 
		    $('#message').html('Not Matching').css({'font-family':'sans-serif' ,'font-size':'10px', 'color':'red'});
		});
  
        //the min chars for username  
        var min_chars = 6;  
  
        //result texts  
        var characters_error = 'Minimum amount of chars is 6';  
        var checking_html = 'Checking...';  
  
        //when button is clicked  
        $('#username').keyup(function(){  
            //run the character number check  
            if($('#username').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result').html(characters_error);  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#username_availability_result').html(checking_html);  
                check_availability();  
            }  
        });  
  
  });  
  
//function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
  
        //use ajax to run the check  
        $.post("eksekutif_cek_username.php", { username: username },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(username + ' is Available').css({'font-family':'sans-serif' ,'font-size':'10px', 'color':'red'});
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html(username + ' is not Available').css({'font-family':'sans-serif' ,'font-size':'10px', 'color':'green'}); 
                }  
        });  
  
}  
	</script>
	
</body>

</html>
