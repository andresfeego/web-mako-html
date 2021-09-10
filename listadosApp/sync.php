<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	

			$sql = "select e.codigo, e.nombre, e.descripcion , e.direccion, e.palabras_clave, te.telefono, te.wp, ci.nombre as nomCiu, ci.id_ciudad as codCiu, ci.color, ca.categoria

			from empresa as  e
			
			join barrios as ba
			on e.barrio = ba.idBarrio

			join ciudades as ci
			on ba.id_ciudad = ci.id_ciudad
			
			join empresa_has_categoria as hc
			on e.codigo = hc.id_empresa

			join categoria as ca
			on hc.idCat = ca.idCat

			join subcategoria2 as sub2
			on sub2.idsubcategoria2 = ca.categoria

			join empresa_has_telefonos as ht
			on ht.empresa_codigo = e.codigo

			join telefonos as te
			on te.id_telefono = ht.telefonos_id_telefono
            
            where te.principal = 1 and e.activo = 1 and e.oculto = 0 ORDER BY e.nombre ASC";
	

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

//sub2.nombre like '%".$busServicios."%' or sub1.nombre like '%".$busServicios."%' or cas.nombre like '%".$busServicios."%' or 

 ?>