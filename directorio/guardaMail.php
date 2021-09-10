<?php 
include ("../registro/conexion.php");
mysql_select_db($baseDatos);
mysql_query("SET NAMES 'UTF8'");
?>
<?php 
 $mail = $_POST['mail'];
 $pass = $_POST['pass'];
 $codi = 0;
$Fecha = date('Y-m-d H:i');

if (!empty($_POST['codig'])) {
	$codi=$_POST['codig'];
} 


if ($codi=="vacio") {
	$sql="select codigo from  codigos where enUso = '0' and registrando = '0'  order by codigos.numeroFactura asc limit 0,1 ";
			$res=mysql_query($sql);

			$fila=mysql_fetch_array($res);



			$sql = "update codigos set email='".$mail."', pass='".$pass."', registrando='1',`fechayHora` =  '".$Fecha."' where codigo='".$fila['codigo']."'";

			if ($results=@mysql_query($sql)) {

			$codi=$fila['codigo'].mysql_error();
			} 
} else {
		
		$sql2 = "update codigos set email='".$mail."', pass='".$pass."', registrando='1',`fechayHora` =  '".$Fecha."' where codigo='".$codi."'";

			if ($results2=@mysql_query($sql2)) {

			$codi=$codi.mysql_error();
			} 
}





echo $codi.mysql_error();


 ?>

 