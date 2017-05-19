<?php 
session_start();
unset($_SESSION['nim']); 
unset($_SESSION['nip']);
unset($_SESSION['username']);
session_destroy();
header('location:index.php');
?>