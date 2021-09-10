<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	   $codigo = $obj['codigo'];

	 // name store into $name.
	

			$sql = "select  e.*, p.* ,ci.color

					from empresa as e 
                    
                    join barrios as ba
			on e.barrio = ba.idBarrio

			join ciudades as ci
			on ba.id_ciudad = ci.id_ciudad
			
                    
                    join empresa_has_promo as hp
					on hp.id_empresa = e.codigo

					join promo as p
                    on hp.id_promo = p.id

					where p.activo ='1' and p.eliminado = '0' and e.activo = 1 order by p.listado
                    ";
		


$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {

$cont = 0;	

	while ($row[] = mysql_fetch_array($res)) {
			
			if ($cont == 0) {
				$sql = "update promo set listado = (listado+1) where id='".$row['p.id']."'";
                $results=@mysql_query($sql);
			}
			$cont++;
			$Json1 = json_encode($row[['id']]);	
			
		
		
	}

	
	}

else {
	$Json1 = json_encode("0");
}



echo $Json1;


mysql_close($conexion);

 ?>