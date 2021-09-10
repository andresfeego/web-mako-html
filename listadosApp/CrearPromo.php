<?php
include("../registro/conexion.php");
mysql_select_db($baseDatos);
mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);

// name store into $name.
$activo = $obj['activo'];
$existencias = $obj['existencias'];
$porciento = $obj['porciento'];
$idComercio = $obj['idComercio'];
$titulo = $obj['titulo'];
$descrip = $obj['descrip'];
$fechaInicio = $obj['fechaInicio'];
$fechaFin = $obj['fechaFin'];

$fecha = date('Y-m-d');




$sql = "INSERT INTO `promo` (`titulo`, `porciento`, `descripcion`, `fechaInicio`, `fechaFin`, `existencias` , `activo`)VALUES ('" . $titulo . "', '" . $porciento . "', '" . $descrip . "', '" . $fechaInicio . "', '" . $fechaFin . "', '" . $existencias . "', '" . $activo . "');";
if ($results = @mysql_query($sql)) {

  if ($activo == 1) {
    $sql1 = "update empresa set numPromo = (numPromo+1) where codigo='" . $idComercio . "'";
    $results = @mysql_query($sql1);
  }


  $rs = mysql_query("select max(id) as id from `promo` ");

  if ($row = mysql_fetch_row($rs)) {
    $idPromo = trim($row[0]);
  };


  $sql2 = "INSERT INTO   `empresa_has_promo` (`id_empresa`,`id_promo`)VALUES ('" . $idComercio . "','" . $idPromo . "');";




  if ($results = @mysql_query($sql2)) {

    $Json1 = json_encode("1");
  } else {
    $Json1 = json_encode("0");
  }
} else {
  $Json1 = json_encode("0");
};




echo $Json1;


mysql_close($conexion);
