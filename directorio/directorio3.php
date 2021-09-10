<?php 

include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");



//  codigo que pide el id del comercio por get para mostrar abierta la ventana de info del negocio y cambiar info de etiquetas meta

if (!empty($_GET['id'])) {
   
		if (!empty($_GET['idPromo'])) {
			
			$codpost = $_GET['id'];
				$sql="select * from  empresa  where codigo like '".$codpost."'";
				$res=mysql_query($sql);
				$empresa=mysql_fetch_array($res);

				$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
				$res1=mysql_query($sql1);
				$infbarrio=mysql_fetch_array($res1);
				$barrio=$infbarrio['nombreBarrio'];

				$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
				$resc=mysql_query($sqlc);
				$infciudad=mysql_fetch_array($resc);

				$sqlp="select * from  promo  where id = ".$_GET['idPromo'];
				$resp=mysql_query($sqlp);
				$infPromo=mysql_fetch_array($resp);


				$razon=$empresa['nombre'];
				$logo='https://www.mako.guru/directorio/'.$empresa['url_logo'];
				$descripcion=strtoupper('Super promocion exclusiva en www.mako.guru -  ').$infPromo['descripcion'];
				$tipo=$empresa['tipo_comercio'];
				$ciudad=$infciudad['nombre'];
				$keyss = "sogamoso,tunja,paipa,mako,boyaca,duitama,".$empresa['palabras_clave'].','.$empresa['descripcion'];

		} else {

			if (!empty($_GET['idInfo'])) {
				$codpost = $_GET['id'];
				$sql="select * from  empresa  where codigo like '".$codpost."'";
				$res=mysql_query($sql);
				$empresa=mysql_fetch_array($res);

				$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
				$res1=mysql_query($sql1);
				$infbarrio=mysql_fetch_array($res1);
				$barrio=$infbarrio['nombreBarrio'];

				$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
				$resc=mysql_query($sqlc);
				$infciudad=mysql_fetch_array($resc);

				$sqli="select * from  informativo  where id = ".$_GET['idInfo'];
				$resi=mysql_query($sqli);
				$infInfo=mysql_fetch_array($resi);


				$razon=$empresa['nombre'];
				$logo='https://www.mako.guru/directorio/'.$empresa['url_logo'];
				$descripcion=strtoupper('Informacion importante en www.mako.guru - ').$infInfo['descripcion'];
				$tipo=$empresa['tipo_comercio'];
				$ciudad=$infciudad['nombre'];
				$keyss = "sogamoso,tunja,paipa,mako,boyaca,duitama,".$empresa['palabras_clave'].','.$empresa['descripcion'];
			} else {
				
				$codpost = $_GET['id'];
				$sql="select * from  empresa  where codigo like '".$codpost."'";
				$res=mysql_query($sql);
				$empresa=mysql_fetch_array($res);

				$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
				$res1=mysql_query($sql1);
				$infbarrio=mysql_fetch_array($res1);
				$barrio=$infbarrio['nombreBarrio'];

				$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
				$resc=mysql_query($sqlc);
				$infciudad=mysql_fetch_array($resc);


				$razon=$empresa['nombre'];
				$logo='https://www.mako.guru/directorio/'.$empresa['url_logo'];
				$descripcion=strtoupper($empresa['descripcion']).'         	  	• Se ha unido a  MAKO.GURU, ahora puedes encontrar los datos de contacto como número telefónico, dirección, e-mail y horarios. No te quedes por fuera, registra tu negocio ya mismo en www.mako.guru';
				$tipo=$empresa['tipo_comercio'];
				$ciudad=$infciudad['nombre'];
				$keyss = "sogamoso,paipa,tunja,mako,boyaca,duitama,".$empresa['palabras_clave'].','.$empresa['descripcion'];
			}
			
		}
		

    }else{

    $razon='Un directorio para todos';
	$logo='https://mako.guru/registro/imagenes/logomakoface.png';
	$descripcion='Directorio comercial, empresarial y profesional para toda Boyacá, donde podrás encontrar toda la información básica de contacto de tus locales comerciales favoritos, con botones de acción para realizar llamadas, enviar correos y mensajes de whatsapp al instante, sección de noticias actualizadas de la región y un espacio especial con una lista de animalitos para adopción.';
	$codpost="0";
	$tipo="0";
	$ciudad="";
	$keyss = "Directorio comercial sogamoso,tunja, duitama, paipa ,directorio,comercio,paginas amarillas,mako,boyaca,mako boyaca,comercio boyaca,comercial,localescomerciales boyaca, buscador de comercio boyaca";

    }


///////////////////////////////////////////////////////////////////////////////

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo $razon." - ".$ciudad; ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta content=<?php echo $logo; ?> property='og:image'/>

<?php echo "<meta name='description' content='".$descripcion."'>"; ?>
<?php echo "<meta name='keywords' content='".$keyss."'>"; ?>

	<link rel="shortcut icon" type="image/png" href="../registro/favicon.png" />    
	<link href="css/directorio.css" rel="stylesheet" type="text/css">
	<link href="css/menu.css" rel="stylesheet" type="text/css">
	<!--<link href="css/normalize.css" rel="stylesheet" type="text/css">!-->
	<link href="css/demo.css" rel="stylesheet" type="text/css">
 	<script type="text/javascript" language="javascript" src="../registro/js/ajaxLoad.js"></script> 
 	<script type="text/javascript" language="javascript" src="../registro/js/ajaxLoad1.js"></script> 
 	<script type="text/javascript" src="../registro/formulario_files/jquery.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" href="../registro/formulario_files/formoid-flat-green.min.css" type="text/css">

 	<script type="text/javascript">
		var estadoContacto = 1;
		var devi = 1;
		var device = navigator.userAgent;
		<?php echo 'var il="'.$codpost.'";'?>
		<?php echo 'var tipo="'.$tipo.'";'?>

	

		if (device.match(/Iphone/i)|| device.match(/Ipod/i)|| device.match(/Android/i)|| device.match(/J2ME/i)|| device.match(/BlackBerry/i)|| device.match(/iPhone|iPad|iPod/i)|| device.match(/Opera Mini/i)|| device.match(/IEMobile/i)|| device.match(/Mobile/i)|| device.match(/Windows Phone/i)|| device.match(/windows mobile/i)|| device.match(/windows ce/i)|| device.match(/webOS/i)|| device.match(/palm/i)|| device.match(/bada/i)|| device.match(/series60/i)|| device.match(/nokia/i)|| device.match(/symbian/i)|| device.match(/HTC/i) || screen.width < 768){ 
			devi=2;
		}
		 		


	

 	</script>
	<script src="js/directorioFunction.js"></script>

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5OP2PCcPZDja7g44akj5jAYVPFDZqITP";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
 
</head>
<body>


	<div class="feego">
		<span>Desarrollado por: </span>
		<img src="imagenes/logoFeego.png" alt="Feego System - Es sentirse bien con la tecnología">
		<span>Feego System - Todos los derechos reservados</span>
	</div>		
	
	<div class="contenedor">

		<div class="header" id="header">







<div id="jssor_1" style="position:absolute;margin:0 auto;top:0px;left:0px;width:720px;height:480px;overflow:hidden;visibility:hidden;z-index:-1000;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" id="slides"  style="cursor:default;position:relative;top:0px;left:0px;width:720px;height:480px;overflow:hidden;">
             
         

       
         <a data-u="any" href="https://www.jssor.com" style="display:none">jquery carousel</a>
        </div>
</div>






















			<div class="logomako"  data-tilt>
				
			</div>

	





			<div class="contacto" id="contacto" >
				<div class="contcontacto1" onclick="cambiarEstadoContacto();">
					<div class="iconocont1">
							<img class="thumiconocont1" id="thicon1" src="../registro/imagenes/upicon.png" alt=''>
					</div>

					<span>Contacto </span>
				</div>

				<div class="contcontacto" id="what">
					<a href="https://api.whatsapp.com/send?phone=573197913842&text=Hola,%20te%20contacto%20desde%20www.mako.guru" target="_blank">
						<div class="iconocont what">
							<img class="thumicono" src="../registro/imagenes/wicono3.png" alt=''>
						</div>
						<div class="textcont">
							<span>Envianos un mensaje</span>
						</div>
					</a>
				</div>
				<div class="contcontacto">
					<a data-rel="external" href="tel:3197913842" id="llamada">
						<div class="iconocont">
							<div class="llamar">
								
							<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="50%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
							viewBox="0 0 12661 12001"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Capa_x0020_1">
							<metadata id="CorelCorpID_0Corel-Layer"/>
							<path class="fil0 str0" d="M269 2948c90,1818 1309,3285 2355,4564l1079 1133c1278,1144 4994,4214 6854,2654 247,-206 455,-337 684,-520l872 -789c535,-501 368,-514 -1091,-1392 -252,-151 -1322,-780 -1585,-767 -556,27 -896,1056 -1326,1078 -1157,57 -2442,-868 -3041,-1483 -392,-403 -701,-805 -1026,-1288 -1401,-2090 -519,-1794 378,-2936 -144,-506 -1619,-2956 -2078,-2933 -389,19 -2086,2472 -2075,2679z"/>
							</g>
					</svg>
							</div>
						</div>
						<div class="textcont">
							<span>Llamanos 3197913842</span>
						</div>
					</a>
				</div>
				<div class="contcontacto">
					<a href="mailto:contacto@mako.guru?subject=Contactando%20desde%20Mako.guru%20" id="correo">
						<div class="iconocont">
							<div class="email">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 345.834 345.834" style="enable-background:new 0 0 345.834 345.834;" xml:space="preserve">
								<g>
								<path d="M339.798,260.429c0.13-0.026,0.257-0.061,0.385-0.094c0.109-0.028,0.219-0.051,0.326-0.084
								c0.125-0.038,0.247-0.085,0.369-0.129c0.108-0.039,0.217-0.074,0.324-0.119c0.115-0.048,0.226-0.104,0.338-0.157
								c0.109-0.052,0.22-0.1,0.327-0.158c0.107-0.057,0.208-0.122,0.312-0.184c0.107-0.064,0.215-0.124,0.319-0.194
								c0.111-0.074,0.214-0.156,0.321-0.236c0.09-0.067,0.182-0.13,0.27-0.202c0.162-0.133,0.316-0.275,0.466-0.421
								c0.027-0.026,0.056-0.048,0.083-0.075c0.028-0.028,0.052-0.059,0.079-0.088c0.144-0.148,0.284-0.3,0.416-0.46
								c0.077-0.094,0.144-0.192,0.216-0.289c0.074-0.1,0.152-0.197,0.221-0.301c0.074-0.111,0.139-0.226,0.207-0.34
								c0.057-0.096,0.118-0.19,0.171-0.289c0.062-0.115,0.114-0.234,0.169-0.351c0.049-0.104,0.101-0.207,0.146-0.314
								c0.048-0.115,0.086-0.232,0.128-0.349c0.041-0.114,0.085-0.227,0.12-0.343c0.036-0.118,0.062-0.238,0.092-0.358
								c0.029-0.118,0.063-0.234,0.086-0.353c0.028-0.141,0.045-0.283,0.065-0.425c0.014-0.1,0.033-0.199,0.043-0.3
								c0.025-0.249,0.038-0.498,0.038-0.748V92.76c0-4.143-3.357-7.5-7.5-7.5h-236.25c-0.066,0-0.13,0.008-0.196,0.01
								c-0.143,0.004-0.285,0.01-0.427,0.022c-0.113,0.009-0.225,0.022-0.337,0.037c-0.128,0.016-0.255,0.035-0.382,0.058
								c-0.119,0.021-0.237,0.046-0.354,0.073c-0.119,0.028-0.238,0.058-0.356,0.092c-0.117,0.033-0.232,0.069-0.346,0.107
								c-0.117,0.04-0.234,0.082-0.349,0.128c-0.109,0.043-0.216,0.087-0.322,0.135c-0.118,0.053-0.235,0.11-0.351,0.169
								c-0.099,0.051-0.196,0.103-0.292,0.158c-0.116,0.066-0.23,0.136-0.343,0.208c-0.093,0.06-0.184,0.122-0.274,0.185
								c-0.106,0.075-0.211,0.153-0.314,0.235c-0.094,0.075-0.186,0.152-0.277,0.231c-0.09,0.079-0.179,0.158-0.266,0.242
								c-0.099,0.095-0.194,0.194-0.288,0.294c-0.047,0.05-0.097,0.094-0.142,0.145c-0.027,0.03-0.048,0.063-0.074,0.093
								c-0.094,0.109-0.182,0.223-0.27,0.338c-0.064,0.084-0.13,0.168-0.19,0.254c-0.078,0.112-0.15,0.227-0.222,0.343
								c-0.059,0.095-0.12,0.189-0.174,0.286c-0.063,0.112-0.118,0.227-0.175,0.342c-0.052,0.105-0.106,0.21-0.153,0.317
								c-0.049,0.113-0.092,0.23-0.135,0.345c-0.043,0.113-0.087,0.225-0.124,0.339c-0.037,0.115-0.067,0.232-0.099,0.349
								c-0.032,0.12-0.066,0.239-0.093,0.36c-0.025,0.113-0.042,0.228-0.062,0.342c-0.022,0.13-0.044,0.26-0.06,0.39
								c-0.013,0.108-0.019,0.218-0.027,0.328c-0.01,0.14-0.019,0.28-0.021,0.421c-0.001,0.041-0.006,0.081-0.006,0.122v46.252
								c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5v-29.595l66.681,59.037c-0.348,0.245-0.683,0.516-0.995,0.827l-65.687,65.687v-49.288
								c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v9.164h-38.75c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h38.75v43.231
								c0,4.143,3.357,7.5,7.5,7.5h236.25c0.247,0,0.494-0.013,0.74-0.037c0.115-0.011,0.226-0.033,0.339-0.049
								C339.542,260.469,339.67,260.454,339.798,260.429z M330.834,234.967l-65.688-65.687c-0.042-0.042-0.087-0.077-0.13-0.117
								l49.383-41.897c3.158-2.68,3.546-7.412,0.866-10.571c-2.678-3.157-7.41-3.547-10.571-0.866l-84.381,71.59l-98.444-87.158h208.965
								V234.967z M185.878,179.888c0.535-0.535,0.969-1.131,1.308-1.765l28.051,24.835c1.418,1.255,3.194,1.885,4.972,1.885
								c1.726,0,3.451-0.593,4.853-1.781l28.587-24.254c0.26,0.38,0.553,0.743,0.89,1.08l65.687,65.687H120.191L185.878,179.888z"/>
								<path d="M7.5,170.676h126.667c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H7.5c-4.143,0-7.5,3.357-7.5,7.5
								S3.357,170.676,7.5,170.676z"/>
								<path d="M20.625,129.345H77.5c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H20.625c-4.143,0-7.5,3.357-7.5,7.5
								S16.482,129.345,20.625,129.345z"/>
								<path d="M62.5,226.51h-55c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h55c4.143,0,7.5-3.357,7.5-7.5S66.643,226.51,62.5,226.51z"
								/>
								</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
				</div>
						</div>
						<div class="textcont">
							<span>e-mail a contacto@mako.guru</span>
						</div>
					</a>
				</div>
				<div class="contcontacto" id="face">
					<a href="https://www.facebook.com/makoguru/" target="_blank">
						<div class="iconocont face">
							<img class="iconface" src="../registro/imagenes/faceicono3.png" alt=''>
						</div>
						<div class="textcont">
							<span>Visita nuestra fanpage</span>
						</div>
					</a>
				</div>

				<div style="float:right; margin-right:20px;" class="fb-share-button" data-href="http://www.mako.guru" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.mako.guru%2F&amp;src=sdkpreparse">Compartir</a></div>


			</div>
		</div>
		
		
		<ul>
			<li onclick="menu(6,false);" id="btn6"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu6" src="imagenes/emo13.png" alt=""></div>   <span>por servicios </span></li>
			<li onclick="menu(5,false);" id="btn5"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu5" src="imagenes/emo13.png" alt=""></div>   <span>por nombre </span></li>
			<li onclick="menu(4,false);" id="btn4"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu4" src="imagenes/emo106.png" alt=""></div>   <span>Acerca del directorio </span></li>
			<li onclick="menu(3,false);" id="btn3"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu3" src="imagenes/emo161.png" alt=""></div>   <span>Vende con nosotros </span></li>
			<li onclick="menu(2,false);" id="btn2"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu2" src="imagenes/emo102.png" alt=""></div>   <span>Nuestros planes </span></li>
			<li onclick="menu(1,false);" id="btn1"><div class="iconomenu"><img class="emoji_menu" id="emoji_menu1" src="imagenes/emo1.png" alt=""></div>    <span>Registra tu negocio </span></li>

		</ul>

		<div class="contenidocero" id="contenidocero">
			
			


		</div>

		<div class="contenido" id="contenido">


<?php 




if (!empty($_POST['codigo'])) {
    $codpost2 = $_POST['codigo'];  
    $estadoregistro = $_POST['codigo'];  
    $errores = $_POST['errores'];  
    $nuevoVendedor = $_POST['nuevoVendedor'];  
    $vendedor = $_POST['vendedor'];  
    $erro = $_POST['erro'];  
    $idVenta = $_POST['idVenta'];  
    }

if (!empty($_GET['menu'])) {
	$menu = $_GET['menu'];
	echo "
		<script>
			menu(".$menu.",false);
		</script>
	";
}





	$sql="select * from  `empresa` where oculto='0' ORDER BY `empresa`.`orden` DESC  ";
	$res2=mysql_query($sql);

	while($empresa=mysql_fetch_array($res2)) {
		


$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
$res1=mysql_query($sql1);
$infbarrio=mysql_fetch_array($res1);
$barrio=$infbarrio['nombreBarrio'];

$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
$resc=mysql_query($sqlc);
$infciudad=mysql_fetch_array($resc);

			$verActivo="";
			$inactivo="";
			if ($empresa['activo']==0) {
				$inactivo="inactivo";
				$verActivo="veractivo";
			}
				
			echo '<div class="comercio '.$inactivo.'" style="border-color: '.$infciudad["color"].'; border-style: solid; border-width: 1px;" onclick="ver('."'".$empresa['codigo']."'".','."'".$empresa['activo']."'".');" onmouseover="colortitulo('."'tit".$empresa['codigo']."','".$infciudad["color"]."','1'".');" onmouseout="colortitulo('."'tit".$empresa['codigo']."','".$infciudad["color"]."','0'".');"> ';


			if (!empty($codpost2)) {
			
				if ($codpost2==$empresa['codigo']&&$vendedor==0) {
						echo '
							<div class="info1" id="info1">
								<span>Hola '.$empresa["nombre"].', que buena onda,</span> <img class="emoji" src="imagenes/emo1.png" alt=""> <span> tu negocio ya esta registrado en el directorio, pero aparecera activo una vez realices el pago a uno de nuestros asesores. Gracias por confiar en las nuevas tecnologias.</span>
								<div class="trianguloizq"></div>
								<div class="cerrarayuda" id="cerrarayuda" onclick="cerrarinfo1();" >X</div>
							</div>
						';
					}	
			} ;

			$verActivo="";
			if ($empresa['activo']==0) {
				$verActivo="veractivo";
			} 

//   imprimiendo en pantalla iconos informativos y promos 

			echo '
				<div class="contInfor">
			';

			if ($empresa['numPromo' ] > 0) {
				echo '
				<div class="boxPromo">
					<div class="txtInformativos">'.$empresa['numPromo'].'</div>
				</div>
				';
			}

			if ($empresa['numInfo'] > 0 ) {
				echo '
				<div class="boxInfor">
					<div class="txtInformativos">'.$empresa['numInfo'].'</div>
				</div>
				';
			}

			echo '	
			</div>
			';

//_______________________________________________________________



 			echo '
				<div class="ver '.$verActivo.'" >
					<span>Ver</span>
				</div>

			
				<div class="ciudad" style="background-color: '.$infciudad["color"].';">
					<span>'.$infciudad["nombre"].'</span>
				</div>

				<div class="logo" style="border-color: '.$infciudad["color"].';">
					<img class="imglogo" src="'.$empresa["url_logo"].'" alt="'.$empresa["nombre"].'">
				</div>
				<div class="texto">
					<div class="titulo" id="tit'.$empresa['codigo'].'" style="background-color: '.$infciudad["color"].';">
						<h1 >'.strtoupper($empresa["nombre"]).'</h1>
					</div>
					<div class="descripcion" >
						<h2 >'.ucfirst(strtolower($empresa["descripcion"])).'</h2>

					</div>
				</div>

			</div>	';
			
			


			 } 



?>

			



			

		</div>

	


	<div class="infoLocal" id="infoLocal"  >
		
		<div class='contenidoLoc' id='contenidoLoc'>
				



			<?php

			if (!empty($_POST['codigo'])) {
			
	echo '<script>mostrarInfo();</script>';


		    $sql="select * from  `vendedores` where identificacion = ".$nuevoVendedor."";
			$res2=mysql_query($sql);
			$vend=mysql_fetch_array($res2);

			if ($vendedor==0) {
				$texto="<span>Hola, al parecer realizaste el regsitro sin ayuda de un asesor, por tal razon el sistema a asignado a nuestro asesor: <strong> ".$vend['nombres']." ".$vend['apellidos']." </strong> , podras posponer el pago en los siguientes campos, para agendar una futura visita. Recuerda que solo es posible programar la visita una unica vez.</span>";
			} else {
				$texto="<span>Hola, fuiste asesorado por <strong>".$vend['nombres']." ".$vend['apellidos']." </strong> y ahora podras, entregar el pago del regiostro a nuestro asesor, o podras posponer el pago en los siguientes campos, para agendar una futura visita. Recuerda que solo es posible posponer la visita una unica vez.</span>";
			}
			
	 echo 
			'<div class="cerrar" onclick="cerrar();"></div>
				
				<div class="contactoasesor" id="contactoasesor" >
					<div class="fotoasesor">
						<img src="imagenes/asesores/'.$vend['foto'].'" alt="">
					</div>
					<div class="nombreasesor">
						<span>'.$vend["nombres"].''.$vend["apellidos"].'</span>
					</div>
					<div class="infasesor">
					<span>Asesor comercial</span>
					<div class="contasesor">
						<a class="celasesor" data-rel="external" href="tel:'.$vend["tel1"].'" id="llamada"><span> llamar '.$vend["tel1"].'</span> </a>
						
						<a class="whatasesor" href="https://api.whatsapp.com/send?phone=57'.$vend["tel1"].'&amp;text=Hola,%20te%20contacto%20desde%20www.mako.guru" target="_blank"><img class="" src="../registro/imagenes/wicono3.png" alt=""></a>
					</div>

					<div class="contasesor">
						<a class="celasesor" data-rel="external" href="tel:'.$vend["tel2"].'" id="llamada"><span> llamar '.$vend["tel2"].'</span> </a>
						
						<a class="whatasesor" href="https://api.whatsapp.com/send?phone=57'.$vend["tel2"].'&amp;text=Hola,%20te%20contacto%20desde%20www.mako.guru" target="_blank"><img class="" src="../registro/imagenes/wicono3.png" alt=""></a>
					</div>

					</div>
					
					<img class="logomakoasesor" src="https://www.mako.guru/registro/imagenes/logo.png" alt="">

				</div>

				<div id="inforesgistro">
					
					<div class="imgregistrook">
						<img src="imagenes/emo1.png" alt="">
					</div>

					<div class="txtregistrook">
						'.$texto.'
					</div>



					<div class="botonesregistrook" id="botonesregistrook">

						<form id="porponer1" enctype="multipart/form-data" name="posp1" class="formoid-flat-green" style="" >
							
							<label class="title2">dia:<span class="required" aria-required="true">*</span></label> 
								<select class="element-input in3" name="dia" >	
									'; ?>


									<?php
									$num=1;
									while ( $num<= 31) {
									echo '<option value="'.$num.'">'.$num.'</option>'; 	
									$num++;
									}

									?>


									<?php echo '
								</select>

							<label class="title2">mes:<span class="required" aria-required="true">*</span></label> 
								<select class="element-input in3" name="mes" >	
									<option value="1">Enero</option>
									<option value="2">Febrero</option>
									<option value="3">Marzo</option>
									<option value="4">Abril</option>
									<option value="5">Mayo</option>
									<option value="6">Junio</option>
									<option value="7">Julio</option>
									<option value="8">Agosto</option>
									<option value="9">Septiembre</option>
									<option value="10">Octubre</option>
									<option value="11">Noviembre</option>
									<option value="12">Diciembre</option>
								</select>

						</form>

						
							<div class="rok" onclick="validaposponer(document.posp1,'.$idVenta.');">
								<span>Posponer pago</span>
							</div>
						

						
					</div>



				</div>
					



			';
			} else {
				# code...
			}
			
			 ?>
			


		</div>

	</div>
		

		
	</div>

<?php 
if (!empty($_GET['id'])) {

	echo '<script>ver('."'".$_GET['id']."'".','."'1'".');</script>';
}
				

 ?>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>



	<script src="js/mo.min.js"></script>
	<!--<script src="js/demo.js"></script>!-->
	<script src="js/tilt.jquery.js"></script>	
	
	<script src="js/polyfills.js"></script>
	

		 <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-25.0.7.min.js" type="text/javascript"></script>
    <script type="text/javascript">


var divheader= document.getElementById('header');
        	var divjssor_1= document.getElementById('jssor_1');
        	var divslides= document.getElementById('slides');
	       		 divjssor_1.style.width=divheader.offsetWidth+"px";
	       		 divslides.style.width=divheader.offsetWidth+"px";
	       		 divjssor_1.style.height=divheader.offsetHeight+"px";
	       		 divslides.style.height=divheader.offsetHeight+"px";



        function animaHeader(){

        	


            var jssor_1_SlideshowTransitions = [
            {$Duration:1500,y:-0.5,$Delay:60,$Cols:50,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$Jease$.$InWave,$Round:{$Top:1.5}},
            {$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$Jease$.$InOutSine,$Top:$Jease$.$OutWave,$Clip:$Jease$.$InOutQuad},$Assembly:2050,$Outside:true,$Round:{$Top:1.3}},
            {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Assembly:260,$Round:{$Left:0.8,$Top:2.5}},
            {$Duration:2000,y:-1,$Delay:60,$Cols:50,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
              {$Duration:500,$Delay:30,$Cols:30,$Rows:10,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:$Jease$.$InQuad},
              {$Duration:500,$Delay:30,$Cols:30,$Rows:10,$Clip:15,$Easing:$Jease$.$InQuad}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        };
    </script>


<script>
	
		 		llenaHeader(devi, function(respuesta){
		 			var divContenido = document.getElementById('slides');
        			divContenido.innerHTML = respuesta;
        			animaHeader();
      				
		 		});

function llenaHeader(devi, respuesta){
 var url = 'imagenesHeader.php';
    $.ajax({ 
      async : false,
      type: "POST",
      url: url,
      dataType: 'text',
      data:{
        id: devi,
      },
      success: function(data){
        respuesta(data);
      }
    });

}
</script>
</html>