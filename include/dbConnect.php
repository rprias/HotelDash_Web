<?php 

$server="localhost";
$username="root";
$password="";
$dbname="hotel";
$con = mysqli_connect($server,$username,$password,$dbname);

if (!$con) {
  die("Error en la Conexión: " . mysqli_connect_error());
}



?>
