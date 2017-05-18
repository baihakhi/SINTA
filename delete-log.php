<?php

  include('fn.php');
  $id = readInput($_POST['id']);

  echo hapusData($id);

 ?>
