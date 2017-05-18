<?php

  include('includes/fn.php');
  $id = readInput($_POST['id']);

  echo hapusData($id);

 ?>
