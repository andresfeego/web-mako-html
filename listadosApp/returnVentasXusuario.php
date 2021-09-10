<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];

$sql = "select v.*, v.idComercio as nombre, v.dineroEntregado as telefono, v.idVenta as principal, v.idVenta as wp, v.idVenta as correo
			from ventas as v
			
			where plan='5' and estado='5' and v.idVendedor ='".$id."' ";

$sql1 = "select v.*, e.nombre, e.activo, e.oculto, ba.id_ciudad, e.fechaRegistro, t.telefono, t.principal, t.wp, co.correo

			from ventas as v
			join empresa as e
				on v.idComercio = e.codigo
			join empresa_has_telefonos as h 
				on v.idComercio = h.empresa_codigo
			join telefonos as t
				on h.telefonos_id_telefono = t.id_telefono

			join empresa_has_correo as hc 
				on v.idComercio = hc.empresa_codigo

			join correo as co
				on hc.correo_idcorreo = co.idcorreo

			join barrios as ba
			on e.barrio = ba.idBarrio
			
			where co.principal = '1' and t.principal = '1' and v.idVendedor = '".$id."' order by estado asc";


$res=mysql_query($sql);
$res1=mysql_query($sql1);


if (mysql_num_rows($res)>0 || mysql_num_rows($res1)>0) {
	
	if (mysql_num_rows($res)>0) {
		while ($row[] = mysql_fetch_array($res)) {
		$Json1 = json_encode($row);	
		}
	}

	if (mysql_num_rows($res1)>0) {
		while ($row1[] = mysql_fetch_array($res1)) {
		$Json2 = json_encode($row1);	
		}
	}


} else {
	$finaljson = json_encode("No se han encontrado ventas");
}




if (mysql_num_rows($res)>0 && mysql_num_rows($res1)>0) {
	
	$finalJson = json_encode(array_merge(json_decode($Json1, true),json_decode($Json2, true))) ;
}else{

	if (mysql_num_rows($res)>0) {
		$finalJson = $Json1;	
	}

	if (mysql_num_rows($res1)>0) {
		$finalJson = $Json2;	
	}

}
echo $finalJson;


mysql_close($conexion);

 ?>