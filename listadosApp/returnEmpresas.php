<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$ciudad = $obj['ciudad'];;
	$busRazon = $obj['busRazon'];
	$busServicios = $obj['busServicios'];
	$busCategoria = $obj['busCategoria'];

	if ($ciudad == '0') {
		if ($busCategoria == 0) {
			$sql = "select e.*, ci.color

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

			join subcategoria1 as sub1
			on sub1.idsubcategoria1 = sub2.idsubcategoria1

			join categorias as cas
			on sub1.id_categoria = cas.idcategorias

			where e.oculto = 0 and (e.descripcion like '%".$busServicios."%' or e.palabras_clave like '%".$busServicios."%' or e.nombre like '%".$busServicios."%') and ca.categoria like '%".$busCategoria."%' order by fechaRegistro desc";

		} else {
			
			$sql = "select e.*, ci.color

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

			join subcategoria1 as sub1
			on sub1.idsubcategoria1 = sub2.idsubcategoria1

			join categorias as cas
			on sub1.id_categoria = cas.idcategorias

			where e.oculto = 0 and (e.descripcion like '%".$busServicios."%' or e.palabras_clave like '%".$busServicios."%' or e.nombre like '%".$busServicios."%') and ca.categoria like '".$busCategoria."' order by fechaRegistro desc";
		}
		
	}else{

		if ($busCategoria == 0) {
			$sql = "select e.*, ci.color

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

			join subcategoria1 as sub1
			on sub1.idsubcategoria1 = sub2.idsubcategoria1

			join categorias as cas
			on sub1.id_categoria = cas.idcategorias

			where ba.id_ciudad = '".$ciudad."' and e.oculto = 0 and (e.descripcion like '%".$busServicios."%' or e.palabras_clave like '%".$busServicios."%' or e.nombre like '%".$busServicios."%') and ca.categoria like '%".$busCategoria."%' order by fechaRegistro desc";

		} else {
			
			$sql = "select e.*, ci.color

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

			join subcategoria1 as sub1
			on sub1.idsubcategoria1 = sub2.idsubcategoria1

			join categorias as cas
			on sub1.id_categoria = cas.idcategorias

			where ba.id_ciudad = '".$ciudad."' and e.oculto = 0 and (e.descripcion like '%".$busServicios."%' or e.palabras_clave like '%".$busServicios."%' or e.nombre like '%".$busServicios."%' ) and ca.categoria like '".$busCategoria."' order by fechaRegistro desc";

		}
		
	}


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