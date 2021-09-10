
<?php 
include ("../registro/conexion.php");
mysql_select_db($baseDatos);
mysql_query("SET NAMES 'UTF8'");
?>


<?php 


$dia=$_POST['dia'];
$mes=$_POST['mes'];
$venta=$_POST['venta'];
$fecha='("2018-'.$mes.'-'.$dia.'")';




$sql = "update ventas set fechaPospuesto=".$fecha." where idVenta='".$venta."'";
                        if ($results=@mysql_query($sql)) {
                        	echo '1';
                        } else{
                        	echo '0';
                        };






mysql_close($conexion);

 ?>