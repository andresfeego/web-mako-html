<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
  $id = $obj['id'];
 	  $idComercio = $obj['idComercio'];
$fecha = date('Y-m-d');


  $sql1 = "select e.codigo, p.* from `empresa` as e
            
                      join empresa_has_promo as hp
                      on e.codigo = hp.id_empresa

                      join promo as p
                      on p.id = hp.id_promo

                        where p.id = ".$id." ";
    
            $res1=mysql_query($sql1);
            $empresa = mysql_fetch_array($res1);



$sql = "update promo set eliminado = '1' where id='".$id."'";
                        if ($results=@mysql_query($sql)) {
                              
              if ($empresa['activo'] == 1) {
                
                    $sql1 = "update empresa set numPromo = (numPromo-1) where codigo='".$idComercio."'";
                    $results=@mysql_query($sql1);
                             
              } 

                            
                                $Json1 = json_encode("1");
                             
                         
                        } else{
                        	$Json1 = json_encode("0");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>