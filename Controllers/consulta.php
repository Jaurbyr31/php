<?php 

include_once '../Models/conexion.php';

$query = "select * from usuarios";
if($is_query_run = mysqli_query($conn, $query)){
  $userData = [];
  while($query_executed = mysqli_fetch_assoc($is_query_run)){
    $userData[] =$query_executed;
  }
}
else{
  echo "Error in execution";
}

echo json_encode($userData);



?>