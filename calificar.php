<?php

include 'db_connect.php';

$id=$_REQUEST['id'];
$votacion=$_REQUEST['votacion'];

if($votacion=="masuno"){
  $mysqli->query("UPDATE eps SET calificacion=calificacion+1 WHERE id=".$id);
} elseif($votacion=="menosuno"){
  $mysqli->query("UPDATE eps SET calificacion=calificacion+-1 WHERE id=".$id);
}

if ($result = $mysqli->query("SELECT calificacion FROM eps WHERE id=".$id)) {
  $eps = $result->fetch_object();
  echo $eps->calificacion;  
  $result->close();
}

$mysqli->close();


?>