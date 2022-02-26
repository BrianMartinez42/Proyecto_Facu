<?php
  include_once "Proyecto.php";
  $user= new Proyecto();
  $response = array();

  $u=$user->buscar("alumno","1");
  $response["alumno"]=array();
  foreach ($u as $key){
    $datos=array();
    foreach ($key as $k => $v){
      $datos[$k] = $v;
    }
    array_push($response["alumno"], $datos);
  }
  die(json_encode($response));
?>
