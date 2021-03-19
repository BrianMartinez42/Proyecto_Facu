<?php 

$nombre=$_POST['nombre'];
$pass=$_POST['pass'];

$conexion=mysqli_connect("localhost", "root", "", "proyecto");
$consulta="SELECT * FROM profesor WHERE nombre='$nombre' and pass='$pass'";
$resultado=mysqli_query($conexion, $consulta);
    
$filas=mysqli_num_rows($resultado);
if ($filas>0){
    header("location:profesor.html");     
}
else{
    echo"Error en la autentificacion"; 
    //$errorlogin = "Nombre de ussuario y/o password incorrecto";
    //include_once 'login profesor.html';
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>