<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
$user = $obj['id'];
$fecha = date('Y-m-d');




	$sql = "select * from `vendedores` where identificacion = ".$user." ";
  $sql1 = "select * from `ventas` where idVendedor = ".$user." and numConsignacion = 0 ";
  $sql2 = "select * from `ventas` where idVendedor = ".$user." and dineroEntregado = 0 ";
	
  $res=mysql_query($sql);
  $res1=mysql_query($sql1);
  $res2=mysql_query($sql2);

              $usuario = mysql_fetch_array($res);

       
              
              
              if ($usuario['bloqueo'] > mysql_num_rows($res2)) {
                
                  
                    $Json1 = json_encode("3");  // NO bloqueo 
                    $sql3 = "update vendedores set activo='1' where identificacion='".$user."'";

                                
                            

              } else {
                  if (mysql_num_rows($res1)>0) {
                    $Json1 = json_encode("2");  // bloqueo por reporte de entrega
                    $sql3 = "update vendedores set activo='0' where identificacion='".$user."'";

                  } else {
                     $Json1 = json_encode("1");  // bloqueo por verificacion
                    $sql3 = "update vendedores set activo='0' where identificacion='".$user."'";
                  }
              }
        
        



$results=@mysql_query($sql3);

       echo $Json1;





mysql_close($conexion);

 ?>