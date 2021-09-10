<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
  $correo = $obj['correo'];
  $nombres = $obj['nombres'];
  $apellidos = $obj['apellidos'];
  $genero = $obj['genero'];
  $fechaNacimiento = $obj['fechaNacimiento'];
  $pass1 = $obj['pass1'];
  	
$fecha = date('Y-m-d');

$sql1 = "select u.*
      from usuario as u
      where u.correo = '".$correo."'";


      $res1=mysql_query($sql1);
if (mysql_num_rows($res1)>0) {
  
       	$Json1 = json_encode("2");	


} else {


$sql = "INSERT INTO `usuario` (`correo`, `nombres`, `apellidos`, `genero`, `fechaNacimiento`, `pass`)VALUES ('".$correo."', '".$nombres."', '".$apellidos."', '".$genero."', '".$fechaNacimiento."', '".$pass1."');";                     
   if ($results=@mysql_query($sql)) {
     
        $Json1 = json_encode("1");
          
    } else{
    
        $Json1 = json_encode("0");  
    
    };

 
 
}





echo $Json1;


mysql_close($conexion);

 ?>