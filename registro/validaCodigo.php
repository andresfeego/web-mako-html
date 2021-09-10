<?php 
include ("conexion.php");
mysql_select_db($baseDatos);
mysql_query("SET NAMES 'UTF8'");
?>
<?php 
$codigo = $_POST['cod'];
$errores=0;

    $sql="select * from  codigos where codigo = '".$codigo."'";
    $res=mysql_query($sql);

     if($fila=mysql_fetch_array($res)){
          if($fila["enUso"]==1){
         	$errores=2;

          }else{
          	         	echo "ok";

          }
         }else{
         	$errores=1;
         };

mysql_close($conexion);
echo $errores;


 ?>

 