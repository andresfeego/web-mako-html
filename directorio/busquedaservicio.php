
   <?php 

include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");




if (!empty($_POST['codigo'])) {
    $codpost = $_POST['codigo'];  
    }





	$sql="select `codigo` ,  `nombre` , `barrio` , `tipo_comercio` ,  `url_logo` , `descripcion` ,  `visto` ,  `cantidad_de_votos` ,  `nuemro_de_votantes` from  `empresa` where  `activo`=1 and `palabras_clave` like  '%".$_GET['id']."%' or `descripcion` like '%".$_GET['id']."%'  order by `tipo_comercio` DESC ";
	$res2=mysql_query($sql);

	while($empresa=mysql_fetch_array($res2)) {
		


$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
$res1=mysql_query($sql1);
$infbarrio=mysql_fetch_array($res1);
$barrio=$infbarrio['nombreBarrio'];

$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
$resc=mysql_query($sqlc);
$infciudad=mysql_fetch_array($resc);

				
			echo '<div class="comercio" style="border-color: '.$infciudad["color"].'; border-style: solid; border-width: 1px;" onmouseover="colortitulo('."'tit".$empresa['codigo']."','".$infciudad["color"]."','1'".');" onmouseout="colortitulo('."'tit".$empresa['codigo']."','".$infciudad["color"]."','0'".');"> ';


			if (!empty($codpost)) {
			
				if ($codpost==$empresa['codigo']) {
						echo '
							<div class="info1" id="info1">
								<span>Hola '.$empresa["nombre"].', que buena onda,</span> <img class="emoji" src="imagenes/emo1.png" alt=""> <span> ya haces parte del parche de empresarios pioneros </span> <img class="emoji" src="imagenes/emo2.png" alt=""> <span> en esta comunidad que avanza con la tecnología, apartir de ahora tus clientes podrán encontrarte en esta página y muy pronto en aplicativos para IOS y android. </span> <img class="emoji" src="imagenes/emo3.png" alt=""> <span> La verdad, la verdad los locales se encontrarán por orden de llegada, </span> <img class="emoji" src="imagenes/emo4.png" alt=""> <span> pero si quieres permanecer aquí arriba y destacar no dudes en </span> <img class="emoji" src="imagenes/emo5.png" alt=""> <span> enviarnos señales de humo. Ah y no olvides compartir esta info para seguir creciendo. </span>
								<div class="trianguloizq"></div>
								<div class="cerrarayuda" id="cerrarayuda" onclick="cerrarinfo1();" >X</div>
							</div>
						';
					}	
			} ;

 			echo '
				<div class="ver"  onclick="ver('."'".$empresa['codigo']."'".','."'".$empresa['tipo_comercio']."'".');">
					<span>Ver</span>
				</div>

				<div class="ciudad" style="background-color: '.$infciudad["color"].';">
					<span>'.$infciudad["nombre"].'</span>
				</div>

				<div class="logo" style="border-color: '.$infciudad["color"].';">
					<img class="imglogo" src="https://www.mako.guru/directorio/'.$empresa["url_logo"].'" alt="'.$empresa["nombre"].'">
				</div>
				<div class="texto">
					<div class="titulo" id="tit'.$empresa['codigo'].'" style="color: '.$infciudad["color"].';">
						<h1 >'.strtoupper($empresa["nombre"]).'</h1>
					</div>
					<div class="descripcion" >
						<h2 >'.ucfirst($empresa["descripcion"]).'</h2>

					</div>
				</div>

			</div>	';
			
			


			 } 



?>