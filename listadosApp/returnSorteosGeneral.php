<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);
	$codigo = $obj['codigo'];
	$order = $obj['order'];
  	$fecha = date('Y-m-d');

	 // name store into $name.
	


				$sql = "select  e.*, so.* ,ci.color

					from empresa as e 
                    
                    join barrios as ba
			on e.barrio = ba.idBarrio

			join ciudades as ci
			on ba.id_ciudad = ci.id_ciudad
			
                    
                    join empresa_has_sorteo as hs
					on hs.idEmpresa = e.codigo

					join sorteo as so
                    on hs.idSorteo = so.id

					where so.activo ='1' order by so.id desc
                    ";
		
			
		
					//where p.activo ='1' and p.eliminado = '0' and p.FechaInicio <= '".$fecha."' and p.FechaFin >= '".$fecha."' and e.activo = 1 order by p.id desc

					//where p.activo ='1' and p.eliminado = '0' and p.FechaInicio <= '".$fecha."' and p.FechaFin >= '".$fecha."' and e.activo = 1 order by rand()

$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {


	while ($row[] = mysql_fetch_array($res)) {
			
			$Json1 = json_encode($row);	
			
		
		
	}

	
	}

else {
	$Json1 = json_encode("0");
}



echo $Json1;


mysql_close($conexion);

 ?>
