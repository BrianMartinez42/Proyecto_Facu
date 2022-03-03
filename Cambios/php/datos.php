<?php
  include_once "Proyecto.php";
  $datos = new Proyecto();
  $response = array();

  $d=$datos->buscar("alumno","1");
  $response["alumno"]=array();
  foreach ($d as $key){
    $arreglo=array();
    foreach ($key as $k => $v){
      $arreglo[$k] = $v;
    }
    array_push($response["alumno"], $arreglo);
  }
  die(json_encode($response));
?>
