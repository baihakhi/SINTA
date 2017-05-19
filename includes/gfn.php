<?php
require_once('sql_connect.php');

function readInput($input){
  $input = trim($input);
  $input = stripcslashes($input);
  $input = htmlspecialchars($input);
  $input = mysql_real_escape_string($input);
  return $input;
}

function checkQuery($query){
  if (!$query){
    return false;
  }
  return true;
}

function runQuery($query){
  if (checkQuery($query)){
    return $query;
  }
  else {
    return null;
  }
}

function getAllRow($table){
  global $con;
  $row = $con->query("SELECT * FROM ".$table);
  return runQuery($row);
}

function getSpesificRow($table,$idKolom,$id){
  global $con;
  $row = $con->query("SELECT * FROM ".$table." WHERE ".$idKolom." = '".$id."'");
  return runQuery($row);
}

function getSpesificRow2($table,$idKolom1,$id1,$idKolom2,$id2){
  global $con;
  $row = $con->query("SELECT * FROM ".$table." WHERE ".$idKolom1." = '".$id1."' AND ".$idKolom2." = '".$id2."' ");
  return runQuery($row);
}
 ?>
