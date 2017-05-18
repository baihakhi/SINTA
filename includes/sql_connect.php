<?PHP

define ("HOST","localhost");
define ("USER","root");
define ("PASS","");
define ("DATABASE","sinta");
define ("BASE","/SINTA");

$con = new mysqli(HOST,USER,PASS,DATABASE);

if($con->connect_errno){
  echo "Koneksi ke database gagal :<br/>".$con->connect_error;
}
else{
date_default_timezone_set("Asia/Jakarta");
}
?>
