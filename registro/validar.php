<?php include ("conexion.php");?>
	<?php mysql_select_db($baseDatos);
	mysql_query("SET NAMES 'UTF8'");
	?>
	




<?php 
$errores=0;
$registro=0;
$cod=$_POST['codigo'];
$raz=$_POST['razon'];
$des=$_POST['descrip'];
$dir=$_POST['direc'];
$bar=$_POST['barrio'];
$hor=$_POST['hor'];
$cat=$_POST['categoria'];
$keys=$_POST['palclave'];
$lat=$_POST['lat'];
$lng=$_POST['loug'];
$plan= $_POST['plan'];
$vendedor=$_POST['vendedor'];
$responsable=$_POST['responsable'];
$acuerdo=$_POST['acuerdo'];
$Fecha = date('Y-m-d H:i');
$equipo = array_key_exists( 'REMOTE_HOST', $_SERVER) ? $_SERVER['REMOTE_HOST'] : gethostbyaddr($_SERVER["REMOTE_ADDR"]);
$activo=0;
$estado=1;

if ($plan==5) {
	$activo=1;
	$estado=3;

} ;


$erro="jajajaj";


$dom=$_POST['domi'];
if ($dom==1) {$cosdom=$_POST['costdomi'];}else{$cosdom="0";};

$web=$_POST['web'];
if ($web=="") {$web="sin web";};

$img=$_POST['img'];
if ($img==0) {
	$urlLogo="logos/cat/".$cat.".png";
} else {
	$urlLogo="logos/".$cod.".png";
}




#______________________________________________________________________________querys

$sql = "INSERT INTO   `empresa` (`fechaRegistro` , `activo` ,`codigo` ,`nombre` ,`descripcion` ,`direccion` ,`barrio` ,`vc_horas` ,`domicilio` ,`costo_domicilio` ,`pagina_web` ,`url_logo` ,`palabras_clave` ,`ubicacion_maps` ,`cantidad_de_votos` ,`nuemro_de_votantes` ,`tipo_comercio` ,`oculto` ,`lat` ,`lng`)VALUES ('".$Fecha."', '".$activo."','".$cod."',  '".$raz."',  '".$des."',  '".$dir."',  '".$bar."', '".$hor."' ,  '".$dom."' ,  '".$cosdom."',  '".$web."',  '".$urlLogo."', '".$keys."',  '000000000',  '0',  '0',  '".$plan."', '0' , '".$lat."' ,  '".$lng."');";

if ($results=@mysql_query($sql)) {
   $registro++;
} else {
    $errores++;
   if (!$results) {
    die('Consulta no válida: ' . mysql_error());
}

    $erro=$erro . " 1 -";
}


#______________________________________________________________________________guarda categoria

$sql = "INSERT INTO   `categoria` (`categoria`)VALUES ('".$cat."');";

if ($results=@mysql_query($sql)) {
  
} else {
    $errores++;
$erro=$erro . " 2 -";
}




$rs = mysql_query("select max(idCat) as id from `categoria` ");
		if ($row = mysql_fetch_row($rs)) {
			$idcate = trim($row[0]);
			
		};


$sql = "INSERT INTO   `empresa_has_categoria` (`id_empresa`,`idCat`)VALUES ('".$cod."','".$idcate."');";

if ($results=@mysql_query($sql)) {
  
} else {
    $errores++;
$erro=$erro . " 3 -";
}


#   _________________________________________________________________________Horarios

if (isset($_POST['luvi'])) {
	$sql = "INSERT INTO   `horario` (`idhorario` ,`tipoHorario`)VALUES (NULL ,  '1');";
	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 304 -";
}

		$rs = mysql_query("SELECT MAX( idhorario ) FROM horario");
		if ($row = mysql_fetch_row($rs)) {
			$idlv = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_horario` (`empresa_codigo` ,`horario_idhorario`)VALUES ('".$cod."',  '".$idlv."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 5 -";
}

	#____jornadas

	if ($_POST['luvie']==1) {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '1',  '".$_POST['lvmananade']."',  '".$_POST['lvmananaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 6 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('".$idlv."',  '".$idj1."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 7 -";
}

	$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '2',  '".$_POST['lvtardede']."',  '".$_POST['lvtardea']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 8 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idlv',  '$idj2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 9 -";
}
	} else {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '3',  '".$_POST['lvjornadade']."',  '".$_POST['lvjornadaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 10 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj3 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idlv',  '$idj3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 11 -";
}
	};
	
	
};





if (isset($_POST['saba'])) {
	$sql = "INSERT INTO   `horario` (`idhorario` ,`tipoHorario`)VALUES (NULL ,  '2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 12 -";
}
		$rs = mysql_query("SELECT MAX( idhorario ) FROM horario");
		if ($row = mysql_fetch_row($rs)) {
			$idsaba = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_horario` (`empresa_codigo` ,`horario_idhorario`)VALUES ('".$cod."',  '".$idsaba."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 13 -";
}

	#____jornadas

	if ($_POST['sabad']==1) {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '1',  '".$_POST['sbmananade']."',  '".$_POST['sbmananaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 14 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('".$idsaba."',  '".$idj1."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 15 -";
}

	$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '2',  '".$_POST['sbtardede']."',  '".$_POST['sbtardea']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 16 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idsaba',  '$idj2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 17 -";
}
	} else {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '3',  '".$_POST['sbjornadade']."',  '".$_POST['sbjornadaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 18 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj3 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idsaba',  '$idj3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 19 -";
}
	};
	
	
};



if (isset($_POST['lusa'])) {
	$sql = "INSERT INTO   `horario` (`idhorario` ,`tipoHorario`)VALUES (NULL ,  '3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 20 -";
}
		$rs = mysql_query("SELECT MAX( idhorario ) FROM horario");
		if ($row = mysql_fetch_row($rs)) {
			$idlusa = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_horario` (`empresa_codigo` ,`horario_idhorario`)VALUES ('".$cod."',  '".$idlusa."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 21 -";
}

	#____jornadas

	if ($_POST['lusab']==1) {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '1',  '".$_POST['lsmananade']."',  '".$_POST['lsmananaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 22 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('".$idlusa."',  '".$idj1."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 23 -";
}

	$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '2',  '".$_POST['lstardede']."',  '".$_POST['lstardea']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 24 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idlusa',  '$idj2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 25 -";
}
	} else {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '3',  '".$_POST['lsjornadade']."',  '".$_POST['lsjornadaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 26 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj3 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idlusa',  '$idj3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 27 -";
}
	};
};



if (isset($_POST['dofe'])) {
	$sql = "INSERT INTO   `horario` (`idhorario` ,`tipoHorario`)VALUES (NULL ,  '4');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 28 -";
}
		$rs = mysql_query("SELECT MAX( idhorario ) FROM horario");
		if ($row = mysql_fetch_row($rs)) {
			$iddofe = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_horario` (`empresa_codigo` ,`horario_idhorario`)VALUES ('".$cod."',  '".$iddofe."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 29 -";
}

	#____jornadas

	if ($_POST['dofes']==1) {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '1',  '".$_POST['dfmananade']."',  '".$_POST['dfmananaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 30 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('".$iddofe."',  '".$idj1."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 31 -";
}

	$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '2',  '".$_POST['dftardede']."',  '".$_POST['dftardea']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 32 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$iddofe',  '$idj2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 33 -";
}
	} else {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '3',  '".$_POST['dfjornadade']."',  '".$_POST['dfjornadaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 34 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj3 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$iddofe',  '$idj3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 35 -";
}
	};
};



if (isset($_POST['ludo'])) {
	$sql = "INSERT INTO   `horario` (`idhorario` ,`tipoHorario`)VALUES (NULL ,  '5');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 36 -";
}
		$rs = mysql_query("SELECT MAX( idhorario ) FROM horario");
		if ($row = mysql_fetch_row($rs)) {
			$idludo = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_horario` (`empresa_codigo` ,`horario_idhorario`)VALUES ('".$cod."',  '".$idludo."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 37 -";
}

	#____jornadas

	if ($_POST['ludom']==1) {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '1',  '".$_POST['ldmananade']."',  '".$_POST['ldmananaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 38 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('".$idludo."',  '".$idj1."');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 39 -";
}

	$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '2',  '".$_POST['ldtardede']."',  '".$_POST['ldtardea']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 40 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idludo',  '$idj2');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 41 -";
}
	} else {
		$sql = "INSERT INTO   `jornadas` (`idjornadas` ,`tipojornada` ,`de` ,`a`)VALUES (NULL ,  '3',  '".$_POST['ldjornadade']."',  '".$_POST['ldjornadaa']."');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 42 -";
}
		$rs = mysql_query("SELECT MAX( idjornadas ) FROM jornadas");
		if ($row = mysql_fetch_row($rs)) {
			$idj3 = trim($row[0]);
		};

	$sql = "INSERT INTO   `horario_has_jornadas` (`horario_idhorario` ,`jornadas_idjornadas`)VALUES ('$idludo',  '$idj3');";
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 43 -";
}
	};
};


#__________________________________________________________________________________________e-mails

$email1=$_POST['email1'];

$sql = "INSERT INTO   `correo` (`idcorreo` ,`correo` ,`principal`)VALUES (NULL ,  '".$email1."', '1');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 44 -";
}
		$rs = mysql_query("SELECT MAX( idcorreo ) FROM correo");

if ($row = mysql_fetch_row($rs)) {
			$ide1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_correo` (`empresa_codigo` ,`correo_idcorreo`)VALUES ('".$cod."',  '".$ide1."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 45 -";
}




if ($_POST['email2']!="") {
	$email2=$_POST['email2'];

	$sql = "INSERT INTO   `correo` (`idcorreo` ,`correo` ,`principal`)VALUES (NULL ,  '".$email2."', '0');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 46 -";
}
		$rs = mysql_query("SELECT MAX( idcorreo ) FROM correo");

if ($row = mysql_fetch_row($rs)) {
			$ide2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_correo` (`empresa_codigo` ,`correo_idcorreo`)VALUES ('".$cod."',  '".$ide2."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 47 -";
}

};


#__________________________________________________________________________________________telefonos


$cel1=$_POST['cel1'];
if (isset($_POST['Wcel1'])) {
	$wcel1=1;
} else {
	$wcel1=0;
}


$sql = "INSERT INTO   `telefonos` (`id_telefono` ,`telefono` ,`tipo` ,`wp` ,`principal`)VALUES (NULL ,  '$cel1', '0' , '".$wcel1."' , '1');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 48 -";
}
		$rs = mysql_query("SELECT MAX( id_telefono ) FROM telefonos");

if ($row = mysql_fetch_row($rs)) {
			$idc1 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_telefonos` (`empresa_codigo` ,`telefonos_id_telefono`)VALUES ('".$cod."',  '".$idc1."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 49 -";
}


if ($_POST['cel2']) {
	$cel2=$_POST['cel2'];
if (isset($_POST['Wcel2'])) {
	$wcel2=1;
} else {
	$wcel2=0;
}


$sql = "INSERT INTO   `telefonos` (`id_telefono` ,`telefono` ,`tipo` ,`wp` ,`principal`)VALUES (NULL ,  '$cel2', '0' , '".$wcel2."' , '0');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 50 -";
}
		$rs = mysql_query("SELECT MAX( id_telefono ) FROM telefonos");

if ($row = mysql_fetch_row($rs)) {
			$idc2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_telefonos` (`empresa_codigo` ,`telefonos_id_telefono`)VALUES ('".$cod."',  '".$idc2."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 51 -";
}

}


if ($_POST['tel1']) {
	$tel1=$_POST['tel1'];


$sql = "INSERT INTO   `telefonos` (`id_telefono` ,`telefono` ,`tipo` ,`wp` ,`principal`)VALUES (NULL ,  '$tel1', '1' , '0', '0');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 52 -";
}
		$rs = mysql_query("SELECT MAX( id_telefono ) FROM telefonos");

if ($row = mysql_fetch_row($rs)) {
			$idc2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_telefonos` (`empresa_codigo` ,`telefonos_id_telefono`)VALUES ('".$cod."',  '".$idc2."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 53 -";
}

}


if ($_POST['tel2']) {
	$tel2=$_POST['tel2'];


$sql = "INSERT INTO   `telefonos` (`id_telefono` ,`telefono` ,`tipo` ,`wp` ,`principal`)VALUES (NULL ,  '$tel2', '1', '0' , '0');";
		if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 54 -";
}
		$rs = mysql_query("SELECT MAX( id_telefono ) FROM telefonos");

if ($row = mysql_fetch_row($rs)) {
			$idc2 = trim($row[0]);
		};

	$sql = "INSERT INTO   `empresa_has_telefonos` (`empresa_codigo` ,`telefonos_id_telefono`)VALUES ('".$cod."',  '".$idc2."');";	
	if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 55 -";
}

}


$sql = "UPDATE   `codigos` SET  `enUso` =  '1',`fechayHora` =  '".$Fecha."',`equipo` =  '".$equipo."' WHERE  `codigos`.`codigo` =  '".$cod."';";
		if ($registro==1) {
			if ($results=@mysql_query($sql)) {
   
} else {
    
    $errores++;
$erro=$erro . " 56 -";
}
		};
		
		
//   aqui validacion para vendedores 


if ($vendedor==0) {
	$sql="select * from  vendedores order by asignaciones";
    $res=mysql_query($sql);

	if($fila=mysql_fetch_array($res)){
	    $nuevoVendedor=$fila['identificacion'] ;
	  $sql = "UPDATE `vendedores` SET `asignaciones` = `asignaciones` + (1) WHERE `identificacion` = '".$fila['identificacion']."'";
      $results=@mysql_query($sql);

	}

}else{
		$nuevoVendedor=$vendedor;
	};



if ($plan!=5) {
	
		$sql = "INSERT INTO   `ventas` (`idComercio` ,`idVendedor` ,`estado` ,`plan`,`autorizo_registro`,`total_factura`)VALUES ('".$cod."','".$nuevoVendedor."', '".$estado."',  '".$plan."',  '".$responsable."',  '".$acuerdo."');";

		if ($results=@mysql_query($sql)) {
		 
		} else {
		    $errores++;
		    $erro=$erro . " 57 -";
		}

		$rs = mysql_query("SELECT MAX( idVenta ) FROM ventas");

		if ($row = mysql_fetch_row($rs)) {
					$idVenta = trim($row[0]);
				};

	
} else {
	
	  $sql = "UPDATE `ventas` SET `estado`='3' WHERE `idComercio`='".$cod."'";
      $results=@mysql_query($sql);

      $sql1="select * from  ventas where idComercio = '".$cod."'  ";
            $res1=mysql_query($sql1);

            if($fila1=mysql_fetch_array($res1)){
                $idventa=$fila1['idVenta'];
                $vendedor=$fila1['idVendedor'];
                $nuevoVendedor=$vendedor;
            }
                        

}


		echo '
		
			<form name="form1" method="POST" action="../directorio/directorio3.php">

			<input type="hidden" name="estadoRegistro" value="'.$registro.'">
			<input type="hidden" name="errores" value="'.$errores.'">
			<input type="hidden" name="codigo" value="'.$cod.'">
			<input type="hidden" name="nuevoVendedor" value="'.$nuevoVendedor.'">
			<input type="hidden" name="vendedor" value="'.$vendedor.'">
			<input type="hidden" name="erro" value="'.$erro.'">
			<input type="hidden" name="idVenta" value="'.$idVenta.'">
			
			</form>

			<script>

			

			document.form1.submit();	
			




			</script>




		';



mysql_close($conexion);
 ?>